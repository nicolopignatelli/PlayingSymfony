<?php

namespace Coursora\AmministratoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfessoreType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder,  array $options){
        $builder
            ->add("nome", "text")
            ->add("cognome", "text")
            ->add("email", "email")
            ->add("biografia", "textarea")
            ->add("immagine", "file")
            ->add("salva", "submit")
            ->setMethod("POST");
    }

    public function getName(){
        return "amministratore_professore_type";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
           "data_class" => "Coursora\ProfessoreBundle\Entity\Professore"
        ));
    }

}