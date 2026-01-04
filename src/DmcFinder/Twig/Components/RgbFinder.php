<?php

declare(strict_types=1);

namespace App\DmcFinder\Twig\Components;

use App\DmcFinder\DmcColorFinder;
use App\DmcFinder\Dto\DmcResultDto;
use App\DmcFinder\Dto\RgbDto;
use App\DmcFinder\Form\RgbFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent(name: 'DmcFinder:RgbFinder', template: 'dmc-finder/components/RgbFinder.html.twig')]
final class RgbFinder extends AbstractController
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;

    public ?DmcResultDto $dmcFound = null;

    public ?RgbDto $rgbSearched = null;

    #[LiveAction]
    public function submit(DmcColorFinder $dmcColorFinder): void
    {
        $this->submitForm();

        $this->rgbSearched = RgbDto::createFromHexa($this->getForm()->getData()[RgbFormType::HEXA_TEXT_FIELD_NAME]);
        $this->dmcFound = $dmcColorFinder->findClosest($this->rgbSearched);

        $this->resetForm();
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(RgbFormType::class);
    }
}
