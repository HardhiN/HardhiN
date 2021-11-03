<?php

namespace App\Controller\Admin;

use App\Entity\Depute;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeputeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Depute::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('DepNom'),
            TextField::new('DepPrenom'),
            TextField::new('DepCirco'),
            TextField::new('DepDecision'),
            TextField::new('DepEntite'),
            TextField::new('DepNumArrete'),
            TextareaField::new('DepPhotoFile')->setFormType(VichImageType::class),
            ImageField::new('DepPhoto')->setBasePath('/images/deputes')->onlyOnIndex(),
            DateField::new('updatedAt'),
           
        ];
    }
    
}
