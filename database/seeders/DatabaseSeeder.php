<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'Patrick ISHIMWE',
            'email' => 'test@example.com',
            'username' => 'patrick.ishimwe'
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'BYAMUNGU Lewis',
            'email' => 'byamungulewis@gmail.com',
            'username' => 'bmglewis@gmail.com'
        ]);
        \App\Models\Admin::factory()->create([
            'name' => 'NDIKUMANA Eric',
            'email' => 'ndikumana@gmail.com',
            'username' => 'eric.ndikumana'
        ]);
  

        $this->call([
            RolesAndPermissionSeeder::class,
        ]);

        \App\Models\Marital::factory()->create(['title' => 'Single']);
        \App\Models\Marital::factory()->create(['title' => 'Married']);
        \App\Models\Marital::factory()->create(['title' => 'Divorced']);
        \App\Models\Marital::factory()->create(['title' => 'Separated']);
        \App\Models\Marital::factory()->create(['title' => 'Widowed']);
        \App\Models\Marital::factory()->create(['title' => 'Catholic Nun']);
        \App\Models\Marital::factory()->create(['title' => 'Catholic Priest']);

        \App\Models\Lawscategory::factory()->create(['title' => 'Administrative law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Admiralty (or maritime) law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Advertising law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Agency law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Alcohol law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Alternative dispute resolution' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Animal law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Antitrust law (or competition law)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Appellate practice' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Art law (or art and culture law)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Aviation law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Banking law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Bankruptcy law(creditor debtor rights,insolvency reorganization)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Bioethics' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Business law (or commercial law); also commercial litigation' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Business organizations law (or companies law)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Civil law or common law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Class action litigation/Mass tort litigation' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Communications law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Computer law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Conflict of law (or private international law)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Constitutional law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Construction law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Consumer law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Contract law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Copyright law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Corporate law (or company law)", "Corporate compliance law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Corporate governance law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Criminal law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Cryptography law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Cultural property law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Custom law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Cyber law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Defamation' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Derivatives and futures law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Drug control law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Elder law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Employee benefits law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Employment law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Energy law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Entertainment law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Environmental law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Equipment finance law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Evidence' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Family law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'FDA law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Financial services regulation law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Firearm law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Food law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Franchise law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Gaming law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Health law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Health and safety law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Health care law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Immigration law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Insurance law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Intellectual property law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'International law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'International trade and finance law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Internet law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Labour law (or Labor law)' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Land use & zoning law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Litigation' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Martial law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Media law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Mergers & acquisitions law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Military law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Mining law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Juvenile law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Music law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Mutual funds law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Nationality law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Native American law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Obscenity law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Oil & gas law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Parliamentary law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Patent law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Poverty law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Privacy law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Private equity law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Private funds law / Hedge funds law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Procedural law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Product liability litigationProperty law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Public health law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Public International Law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Railroad law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Real estate law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Securities law / Capital markets law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Social Security' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Disability law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Space law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Sports law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Statutory law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Tax law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Technology law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Timber law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Tort law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Trademark law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Transport law / Transportation law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Trusts & estates law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Utilities Regulation Venture capital law' ]);
        \App\Models\Lawscategory::factory()->create(['title' => 'Water law' ]);
    }
}
