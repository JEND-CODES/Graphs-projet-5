<?php

namespace App\Form;

use App\Entity\Chapter;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

// Cf. https://symfony.com/doc/current/reference/forms/types/choice.html
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ChapterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ])
            // Intégration de TinyMCE :
            // Mettre le "required" à "false" pour enregistrer le champs TinyMCE sinon ça marche pas..? Voir : https://stackoverflow.com/questions/10303431/cant-submit-a-form-with-symfony2-and-tinymce
            ->add('content', TextareaType::class, array(
                'required' => false,
                'attr' => array('class' => 'tinymce')
            ))
            ->add('image')
            ->add('graph_title')
            ->add('graph_namex')
            ->add('graph_namey')
            ->add('graph_colorone', ChoiceType::class, [
                'choices'  => [
                    'Couleurs Highcharts' => 'highcharts_colors',
                    'Tons rouge-rose' => 'coloration_1',
                    'Tons bleu-violet' => 'coloration_2',
                    'Dégradé bleu' => 'coloration_3'
                ],
            ])
            ->add('graph_type')
            ->add('graph_value')
            ->add('graph_subtitle')
            ->add('graph_urljson')
            ->add('graph_csvurl')
            ->add('graph_csvfilename')
            ->add('graph_csvtextdatas')
            ->add('graph_arrayjson')
            ->add('graph_seriesnamejson')
            ->add('graph_urlapi')
            ->add('graph_apifilters')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chapter::class,
        ]);
    }
}
