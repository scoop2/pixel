<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
//        $this->call(TranslationsTableSeeder::class);

        $this->call(SkillsTableSeeder::class);
        $this->call(SkillscatsTableSeeder::class);
        $this->call(SetsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TagsSetsTableSeeder::class);
        $this->call(WgUsersTableSeeder::class);
        $this->call(PixelmorphPagesTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(VitaTableSeeder::class);
        $this->call(PersosTableSeeder::class);
    }
}
