<?php

namespace App\entity;

class Passage
{

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Start param is empty !
     */

    private $nb;

    /**
     * @return mixed
     */
    public function getNb()
    {
        return $this->nb;
    }

    /**
     * @param mixed $nb
     * @covers
     */
    public function setNb($nb)
    {
        if ($nb == 2) {
            //throw new \InvalidArgumentException( 'passage'. $nb);
            $this->nb = $nb;
        } elseif ($nb == 1) {
            //throw new \InvalidArgumentException( 'passage'. $nb);
            $this->nb = $nb;
        } else {
            throw new \InvalidArgumentException('passage' . $nb);
        }
        // $this->nb = $nb;
    }
}