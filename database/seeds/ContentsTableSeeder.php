<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //home
        DB::table('contents')->insert([
            'main_title' => 'Reach The Right Lawyer Easily',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor',
            'name' => 'home_first',
        ]);
        DB::table('contents')->insert([
            'main_title' => 'Reach Legal’s Featured Lawyers',
            'description' => 'Explore our directory and discover exclusive ratings and reviews of the lawyers near you.',
            'name' => 'home_second',
        ]);
        DB::table('contents')->insert([
            'title' => '-Lorem ipsum dolor sit',
            'description' => 'Founded in London, UK Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac.',
            'name' => 'home_third',
        ]);
        //about
        DB::table('contents')->insert([
            'main_title' => 'Who We Are',
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna. Suspendisse feugiat tincidunt sapien at tincidunt. Maecenas a magna urna. Sed a interdum orci. Vestibulum arcu elit, faucibus quis lorem at, posuere sodales mi. Nam eget purus et justo vestibulum scelerisque eu auctor nisl. Aliquam finibus diam vel ex pellentesque, vitae tempus lectus rhoncus. Sed eget',
            'name' => 'about_first',
        ]);
        DB::table('contents')->insert([
            'main_title' => 'What We Do',
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.',
            'image_path' => 'assets/site/main/img/about1.png',
            'name' => 'about_second',
        ]);
        DB::table('contents')->insert([
            'main_title' => 'Our team',
            'description' => 'Our team how people get Legal help Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer id interdum dolor. Suspendisse ac consectetur eros, sit amet eleifend libero. Mauris nec nulla sodales dolor blandit eleifend. Aliquam et libero accumsan, interdum est ac, aliquet mauris. Praesent eu metus vitae magna semper cursus. Curabitur sodales consectetur urna.',
            'name' => 'about_third',
        ]);
        //Terms
        DB::table('contents')->insert([
            'main_title' => 'terms and conditions',
            'name' => 'terms',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'terms',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'terms',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'terms',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'terms',
        ]);
        //Privacy
        DB::table('contents')->insert([
            'main_title' => 'Privacy Policy',
            'name' => 'privacy',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'privacy',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'privacy',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'privacy',
        ]);
        DB::table('contents')->insert([
            'title' => 'terms and conditions',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur libero quis sapien porta, vel posuere turpis placerat. Mauris non blandit turpis. Fusce vel elit nec nisl consectetur pulvinar. Suspendisse scelerisque, ipsum non luctus scelerisque, ligula metus posuere dolor, non feugiat augue libero at nisl. Fusce venenatis nisl non ligula malesuada varius. In sit amet commodo enim, vitae scelerisque justo. Ut a purus leo. Quisque non accumsan turpis, vitae volutpat sem. Nunc aliquet nulla sit amet mauris sollicitudin, sed dignissim dolor pretium. Sed tortor dolor, rhoncus eu odio ac, posuere aliquet lectus. Vivamus fermentum eros in pulvinar efficitur. Morbi vestibulum hendrerit malesuada. Sed eu risus ac lectus blandit scelerisque. Maecenas cursus ipsum ut sem varius tincidunt. Suspendisse ac urna quis metus suscipit tincidunt malesuada a ante.',
            'name' => 'privacy',
        ]);
    }
}
