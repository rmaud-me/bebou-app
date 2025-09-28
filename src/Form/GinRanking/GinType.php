<?php

declare(strict_types=1);

namespace App\Form\GinRanking;

use App\Enum\GinRanking\CategoryEnum;
use App\GinRanking\Dto\GinUpsertDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class GinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var ?GinUpsertDto $currentData */
        $currentData = $options['data'] ?? null;

        $builder
            ->add('name')
            ->add('category', EnumType::class, [
                'class' => CategoryEnum::class,
            ])
            ->add('image', FileType::class, [
                'required' => $currentData?->id === null,
                'constraints' => [
                    new Image(groups: ['update']),
                ],
                'data' => $currentData?->image,
            ])
        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $data = $form->getData();

        if (!$data instanceof GinUpsertDto || !$data->currentImagePath) {
            return;
        }

        $view->vars['imageToRender'] = $data->currentImagePath;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefault('data_class', GinUpsertDto::class);
        $resolver->setDefault('method', 'POST');
        $resolver->setDefault('validation_groups', function (Form $form): array {
            $data = $form->getData();

            return [$data instanceof GinUpsertDto && $data->id !== null ? 'update' : 'Default'];
        });
    }
}
