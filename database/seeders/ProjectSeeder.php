<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::updateOrCreate(
            ['slug' => 'nutriscan'],
            [
                'number' => '01',
                'title' => 'NutriScan',
                'category' => 'AI / Web Application',
                'year' => '2026',

                'description' =>
                    'A web application that helps users analyze food products and understand nutritional information through AI-powered scanning.',

                'long_description' =>
                    'NutriScan is a web application designed to simplify the process of understanding nutritional information from food packaging. The application combines image-based scanning and AI integration to provide users with nutritional information in a simple and accessible interface.',

                'problem' =>
                    'Nutritional information on food packaging can be difficult to understand and compare, especially when users need to quickly identify important information.',

                'solution' =>
                    'NutriScan provides a simple scanning workflow that allows users to capture food packaging and receive AI-assisted nutritional information in an easy-to-understand format.',

                'role' => 'Full Stack Developer',
                'status' => 'Prototype',

                'technologies' => implode("\n", [
                    'React',
                    'TypeScript',
                    'AI',
                    'API',
                ]),

                'features' => implode("\n", [
                    'Food packaging scanning',
                    'AI-powered analysis',
                    'Nutritional information',
                    'Responsive interface',
                    'Simple user experience',
                ]),

                'github_url' => null,
                'live_url' => null,

                'sort_order' => 1,
                'is_visible' => true,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'architecture-wahyudi'],
            [
                'number' => '02',
                'title' => 'Architecture Wahyudi',
                'category' => 'Company Profile',
                'year' => '2026',

                'description' =>
                    'A company profile website built to present company information, completed projects, services, and other business information.',

                'long_description' =>
                    'Architecture Wahyudi is a company profile website developed to provide a professional digital presence for an architecture and construction business. The website presents company information, project portfolios, services, and other relevant business information through a responsive interface.',

                'problem' =>
                    'The company needed a professional website to present its profile, projects, and services in a structured and accessible way.',

                'solution' =>
                    'A responsive company profile website was developed using Laravel and Blade, with database-backed content that allows website information to be managed more easily.',

                'role' => 'Web Developer',
                'status' => 'Completed',

                'technologies' => implode("\n", [
                    'Laravel',
                    'Blade',
                    'MySQL',
                    'Tailwind CSS',
                ]),

                'features' => implode("\n", [
                    'Company profile',
                    'Project showcase',
                    'Service information',
                    'Responsive interface',
                    'Content management',
                ]),

                'github_url' => null,
                'live_url' => null,

                'sort_order' => 2,
                'is_visible' => true,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'food-ordering'],
            [
                'number' => '03',
                'title' => 'Food Ordering Application',
                'category' => 'Mobile Application',
                'year' => '2026',

                'description' =>
                    'A mobile food ordering application with menu browsing, cart management, checkout, payment, and order history.',

                'long_description' =>
                    'The Food Ordering Application is a mobile application project focused on creating a convenient food ordering experience. Users can browse food and beverage menus, search products, manage their cart, complete checkout, select payment methods, and review their order history.',

                'problem' =>
                    'Users need a simple way to browse food menus, manage their orders, and complete the purchasing process from a mobile device.',

                'solution' =>
                    'A mobile food ordering application was developed with categorized menus, search, cart management, checkout, payment selection, and order history.',

                'role' => 'Mobile Developer',
                'status' => 'Prototype',

                'technologies' => implode("\n", [
                    'Flutter',
                    'Dart',
                    'Provider',
                    'Firebase',
                ]),

                'features' => implode("\n", [
                    'Food menu',
                    'Search',
                    'Category filtering',
                    'Shopping cart',
                    'Checkout',
                    'Payment method',
                    'Order history',
                ]),

                'github_url' => null,
                'live_url' => null,

                'sort_order' => 3,
                'is_visible' => true,
            ]
        );
    }
}