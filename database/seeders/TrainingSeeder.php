<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing data
        Training::truncate();

        $webinars = [
            [
                'title' => 'Modern Digital Marketing Strategy 2026',
                'description' => 'Master the latest trends in digital marketing, including AI-driven SEO, social media algorithms, and content personalization strategies. Perfect for business owners and marketing professionals looking to scale their reach.',
                'image' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?q=80&w=1470&auto=format&fit=crop',
                'event_date' => now()->addDays(7),
                'type' => 'online',
                'category' => 'webinar',
                'level' => 'beginner',
                'price' => 150000,
                'location_online' => 'Zoom Meeting',
                'is_active' => true,
            ],
            [
                'title' => 'Introduction to Cloud Computing & AWS',
                'description' => 'Get started with Cloud Computing fundamentals. Learn how to deploy scalable applications using Amazon Web Services (AWS) core services like EC2, S3, and RDS.',
                'image' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1472&auto=format&fit=crop',
                'event_date' => now()->addDays(12),
                'type' => 'online',
                'category' => 'webinar',
                'level' => 'beginner',
                'price' => 0,
                'location_online' => 'Google Meet',
                'is_active' => true,
            ],
            [
                'title' => 'Cybersecurity Awareness for Professionals',
                'description' => 'Protect your organization from cyber threats. Learn about phishing, malware, password security, and best practices for remote work security.',
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1470&auto=format&fit=crop',
                'event_date' => now()->addDays(15),
                'type' => 'online',
                'category' => 'webinar',
                'level' => 'intermediate',
                'price' => 200000,
                'location_online' => 'Zoom Webinar',
                'is_active' => true,
            ],
            [
                'title' => 'Data Science Fundamentals with Python',
                'description' => 'Dive into the world of data. Learn how to analyze data, create visualizations, and build basic machine learning models using Python, Pandas, and Scikit-learn.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1470&auto=format&fit=crop',
                'event_date' => now()->addDays(20),
                'type' => 'online',
                'category' => 'webinar',
                'level' => 'intermediate',
                'price' => 250000,
                'location_online' => 'Zoom Meeting',
                'is_active' => true,
            ],
        ];

        foreach ($webinars as $data) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
            Training::create($data);
        }

        $classes = [
            [
                'title' => 'Full Stack Web Development Bootcamp',
                'description' => 'An intensive 12-week bootcamp covering the MERN stack (MongoDB, Express, React, Node.js). Build real-world projects and get job-ready skills under expert mentorship.',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1472&auto=format&fit=crop',
                'event_date' => now()->addDays(30),
                'type' => 'hybrid',
                'category' => 'class',
                'level' => 'expert',
                'price' => 2500000,
                'location_offline' => 'Tirta Bhumi Tech Hub, Jakarta',
                'location_online' => 'Zoom Access',
                'is_active' => true,
            ],
            [
                'title' => 'Advanced Network Engineering Masterclass',
                'description' => 'Deep dive into enterprise network infrastructure. Topics include routing protocols (OSPF, BGP), VLANs, network security, and troubleshooting complex network issues.',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef526b0042a0?q=80&w=1474&auto=format&fit=crop',
                'event_date' => now()->addDays(25),
                'type' => 'offline',
                'category' => 'class',
                'level' => 'expert',
                'price' => 3000000,
                'location_offline' => 'Tirta Bhumi HQ, Meeting Room A',
                'is_active' => true,
            ],
            [
                'title' => 'IT Project Management Certification Prep',
                'description' => 'Prepare for PMP or CAPM certifications. Learn project lifecycle, agile methodologies, risk management, and stakeholder communication for IT projects.',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1470&auto=format&fit=crop',
                'event_date' => now()->addDays(18),
                'type' => 'offline',
                'category' => 'class',
                'level' => 'intermediate',
                'price' => 1800000,
                'location_offline' => 'Tirta Bhumi HQ, Training Center',
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Design Workshop: From Idea to Prototype',
                'description' => 'Learn the principles of user-centered design. Conduct user research, create wireframes, and build interactive high-fidelity prototypes using Figma.',
                'image' => 'https://images.unsplash.com/photo-1586717791821-3f44a5638d48?q=80&w=1470&auto=format&fit=crop',
                'event_date' => now()->addDays(10),
                'type' => 'hybrid',
                'category' => 'class',
                'level' => 'beginner',
                'price' => 1200000,
                'location_offline' => 'Creative Space Jakarta',
                'location_online' => 'Zoom Access',
                'is_active' => true,
            ],
        ];

        foreach ($classes as $data) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
            Training::create($data);
        }
    }
}
