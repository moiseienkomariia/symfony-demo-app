<?php


namespace App\Form;


use App\DTO\EmailRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmailFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', TextType::class,
                [
                    'label' => "E-mail from",
                    'required' => true,
                    'invalid_message' => "Email error"
                ])
            ->add('to', EmailType::class,
                [
                    'label' => "E-mail to",
                    'required' => true,
                    'invalid_message' => "Email error"
                ])
            ->add('Submit', SubmitType::class,
                [
                    'label' => "Send"
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmailRequest::class,
        ]);
    }
}