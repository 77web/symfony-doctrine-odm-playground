<?php
declare(strict_types=1);

namespace App\Form;

use App\Document\FacebookFeedAd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacebookFeedAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('headline')
            ->add('mainText')
            ->add('linkUrl')
            ->add('imageUrl')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => FacebookFeedAd::class,
            ]);
    }

}
