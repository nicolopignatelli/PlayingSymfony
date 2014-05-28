<?php

namespace Coursora\CorsoBundle\Entity;

class Corso {
    private $id;
    private $slug;
    private $titolo;
    private $descrizione;

    private $docente;
    private $iscritti;

    private $stato = self::STATO_APERTO;

    const STATO_CHIUSO = "CHIUSO";
    const STATO_APERTO = "APERTO";

    /**
     * @return mixed
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @param mixed $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @return mixed
     */
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * @param mixed $docente
     */
    public function setDocente($docente)
    {
        $this->docente = $docente;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIscritti()
    {
        return $this->iscritti;
    }

    /**
     * @param mixed $iscritti
     */
    public function setIscritti($iscritti)
    {
        $this->iscritti = $iscritti;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getStato()
    {
        return $this->stato;
    }

    /**
     * @param string $stato
     */
    public function setStato($stato)
    {
        $this->stato = $stato;
    }

    /**
     * @return mixed
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @param mixed $titolo
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    }


}

