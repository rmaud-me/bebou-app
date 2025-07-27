<?php

declare(strict_types=1);

namespace App\Form\DmcFinder;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Validator\Constraints\CssColor;
use Symfony\Component\Validator\Constraints\NotBlank;

class RgbFormType extends AbstractType
{
    public const string HEXA_TEXT_FIELD_NAME = 'hexaText';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(self::HEXA_TEXT_FIELD_NAME, TextType::class, [
            'required' => true,
            'label' => new TranslatableMessage('dmc_finder.form.hexa.label'),
            'constraints' => [
                new CssColor(formats: [CssColor::HEX_LONG, CssColor::HEX_SHORT]),
                new NotBlank(),
            ],
        ]);
    }
}
