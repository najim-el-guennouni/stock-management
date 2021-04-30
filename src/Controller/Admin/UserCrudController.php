<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityPermission('ROLE_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new( propertyName: 'email'),
            TextField::new( propertyName: 'password')->setPermission("ROLE_ADMIN"),
            ArrayField::new( propertyName: 'roles'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->setPermission(Action::DELETE, "ROLE_ADMIN");
    }
}
