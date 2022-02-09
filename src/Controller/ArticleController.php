<?php


namespace App\Controller;


use App\DTO\EmailRequest;
use App\Form\EmailFormType;
use App\Service\ArticleService;
use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use \Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{

    /** @var ArticleService */
    private $articleService;

    /**
     * ArticleController constructor.
     * @param ArticleService $articleService
     */
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * @Route("/articles/")
     *
     */
    function articles()
    {
     $articles = $this->articleService->getArticles();
        return $this->render("test/articles.html.twig", ['articles' => $articles,]);
    }

    /**
     * @Route("/articles/{id}")
     * @param Request $request
     * @param $id
     * @param EmailService $emailService
     * @return Response
     */
    function article(Request $request,
                     $id,
                     EmailService $emailService)
    {
        // get article by id form DB
        $article = $this->articleService->getArticleById($id);

        // create request object
         $emailRequest = new EmailRequest();

        // create form
        $form = $this->createForm(EmailFormType::class, $emailRequest);

        // get request data
        $form->handleRequest($request);

        // valid form
        if ($form->isSubmitted() && $form->isValid()) {
            // get data form form
            $emailRequest = $form->getData();

            // send email
            $emailService->sendEmail($emailRequest->getFrom(), $emailRequest->getTo(), $request->getRequestUri());

            // redirect
            return $this->redirect('/articles/');
        }

        return $this->render("test/article.html.twig",
            [
                'article' => $article,
                'form' => $form->createView()
            ]);
    }
}