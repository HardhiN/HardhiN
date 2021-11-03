<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use Vich\UploaderBundle\Form\Type\VichImageType;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('Titre'),
            TextEditorField::new('Contenu'),
            TextField::new('Auteur'),
            TextareaField::new('ArticleImageFile')->setFormType(VichImageType::class),
            ImageField::new('image')->setBasePath('/images/articles')->onlyOnIndex(),
            DateField::new('CreatedAt'),
            AssociationField::new('categorie'),




        ];
    }
    
}
