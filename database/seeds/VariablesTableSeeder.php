<?php

use Illuminate\Database\Seeder;
use App\Models\Variable;

class VariablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Variable::create([
            'name'  => 'Category',
            'key'   => 'category-text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget erat dignissim temporLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget erat dignissim tempor',
        ]);

        Variable::create([
            'name'  => 'About Who We Are Subheader',
            'key'   => 'about-who-we-are-subheader',
            'value' => 'Lorem ipsum dolor sit amet',
        ]);

        Variable::create([
            'name'  => 'About Who We Are Text',
            'key'   => 'about-who-we-are-text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna. Suspendisse feugiat tincidunt sapien at tincidunt. Maecenas a magna urna. Sed a interdum orci. Vestibulum arcu elit, faucibus quis lorem at, posuere sodales mi. Nam eget purus et justo vestibulum scelerisque eu auctor nisl. Aliquam finibus diam vel ex pellentesque, vitae tempus lectus rhoncus. Sed eget',
        ]);

        Variable::create([
            'name'  => 'About Who We Do Subheader',
            'key'   => 'about-who-we-do-subheader',
            'value' => 'Lorem ipsum dolor sit amet',
        ]);

        Variable::create([
            'name'  => 'About What We Do Text',
            'key'   => 'about-what-we-do-text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.',
        ]);

        Variable::create([
            'name'  => 'About Our Team Text',
            'key'   => 'about-our-team-text',
            'value' => 'Our team how people get Legal help Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.',
        ]);

        Variable::create([
            'name'  => 'Join Community Header',
            'key'   => 'join-community-header',
            'value' => 'Join the community',
        ]);

        Variable::create([
            'name'  => 'Join Community Text',
            'key'   => 'join-community-text',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et',
        ]);
    }
}
