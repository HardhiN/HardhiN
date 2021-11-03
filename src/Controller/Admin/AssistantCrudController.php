<?php

namespace App\Controller\Admin;

use App\Entity\Assistant;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AssistantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Assistant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('AssNom'),
            TextField::new('AssPrenom'),
            DateField::new('DateNomination'),
            TextField::new('ArreteNomination'),
            DateField::new('DateAbrogation'),
            TextField::new('ArreteAbrog'),
            ChoiceField::new('Titre')
            ->setLabel("Titre")
            ->allowMultipleChoices(false)
            ->renderExpanded(true)
            
            ->setChoices( ['APNP' => 'APNP','APP' => 'APP','ATNP' => 'ATNP','ATP' => 'ATP']),
            AssociationField::new('depute')->autocomplete(),
            TextField::new('Telephone'),
            TextareaField::new('Observation'),
            

            
           




            
        ];
    }
    
}
