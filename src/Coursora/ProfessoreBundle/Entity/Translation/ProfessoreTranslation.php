<?php
namespace Coursora\ProfessoreBundle\Entity\Translation;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Entity\MappedSuperclass\AbstractTranslation;

/**
 * @ORM\Table(name="professore_translations", indexes={
 *      @ORM\Index(name="professore_translation_idx", columns={"locale", "object_class", "field", "foreign_key"})
 * })
 * @ORM\Entity(repositoryClass="Gedmo\Translatable\Entity\Repository\TranslationRepository")
 */
class ProfessoreTranslation extends AbstractTranslation
{
    private $biografia;

    /**
     * @return mixed
     */
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * @param mixed $biografia
     */
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;
    }


}