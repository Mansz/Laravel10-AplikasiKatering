<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\MenuResource;
use App\Filament\Resources\MerchantResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\UserResource;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class StatsOverview extends Widget
{
    protected OrderResource $orderModel;
    protected MerchantResource $merchantModel;
    protected MenuResource $menuModel;
    protected CustomerResource $customerModel;
    protected UserResource $userModel;

    public function __construct(
        OrderResource $orderModel,
        MerchantResource $merchantModel,
        MenuResource $menuModel,
        CustomerResource $customerModel,
        UserResource $userModel
    ) {
        $this->orderModel = $orderModel;
        $this->merchantModel = $merchantModel;
        $this->menuModel = $menuModel;
        $this->customerModel = $customerModel;
        $this->userModel = $userModel;
    }

    protected function getOrdersCount(): int
    {
        return $this->orderModel->getModel()::count();
    }

    protected function getMerchantsCount(): int
    {
        return $this->merchantModel->getModel()::count();
    }

    protected function getMenusCount(): int
    {
        return $this->menuModel->getModel()::count();
    }

    protected function getCustomersCount(): int
    {
        return $this->customerModel->getModel()::count();
    }

    protected function getUsersCount(): int
    {
        return $this->userModel->getModel()::count();
    }

    private const COLOR_SUCCESS = 'bg-green-500';
    private const COLOR_PRIMARY = 'bg-blue-500';
    private const COLOR_SECONDARY = 'bg-gray-500';
    private const COLOR_WARNING = 'bg-yellow-500';
    private const COLOR_DANGER = 'bg-red-500';

    protected function getCards(): array
    {
        return [
            
            [
                'title' => 'Orders',
                'count' => $this->getOrdersCount(),
                'color' => self::COLOR_SUCCESS,
                'icon' => 'fa fa-shopping-cart',
            ],
            [
                'title' => 'Merchants',
                'count' => $this->getMerchantsCount(),
                'color' => self::COLOR_PRIMARY,
                'icon' => 'fa fa-store',
            ],
            [
                'title' => 'Menus',
                'count' => $this->getMenusCount(),
                'color' => self::COLOR_SECONDARY,
                'icon' => 'fa fa-list',
            ],
            [
                'title' => 'Customers',
                'count' => $this->getCustomersCount(),
                'color' => self::COLOR_WARNING,
                'icon' => 'fa fa-users',
            ],
            [
                'title' => 'Users',
                'count' => $this->getUsersCount(),
                'color' => self::COLOR_DANGER,
                'icon' => 'fa fa-user',
            ],
        ];
    }

    public function render(): View
    {
        $cards = $this->getCards();
        $view = new View('dashboard', ['cards' => $cards]);
        return $view;
        }
    }
    
