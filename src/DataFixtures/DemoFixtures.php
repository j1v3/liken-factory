<?php

namespace App\DataFixtures;

use App\Entitiy\Content;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Menu;
use App\Entity\SubMenu;
use App\Repository\ContentRepository;
use App\Repository\UserRepository;
use App\Repository\MenuRepository;
use App\Repository\SubMenuRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DemoFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail("admin@likenfactory.com");
        $user1->setRoles(["ROLE_ADMIN"]);
        $user1->setPassword($this->passwordEncoder->encodePassword(
        $user1,
        "admin"
        ));
        $manager->persist($user1);
        
        $user2 = new User();
        $user2->setEmail("webmaster@likenfactory.com");
        $user2->setRoles(["ROLE_USER"]);
        $user2->setPassword($this->passwordEncoder->encodePassword(
        $user2,
        "wabmaster"
        ));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail("dummyy@likenfactory.com");
        $user3->setRoles(["ROLE_USER"]);
        $user3->setPassword($this->passwordEncoder->encodePassword(
        $user3,
        "dummy"
        ));
        $manager->persist($user3);

        $role1 = new Role;
        $role1->setName("public");
        $role1->setDescription("Public role for demo use");
        $manager->persist($role1);

        $role2 = new Role;
        $role2->setName("private");
        $role3->setDescription("Private role for demo use");
        $manager->persist($role2);

        $role3 = new Role;
        $role3->setName("webmaster");
        $role3->setDescription("Webmaster role for demo use");
        $manager->persist($role3);

        $role4 = new Role;
        $role4->setName("admin");
        $role4->setDescription("Admin role for demo use");
        $manager->persist($role4);
    
        $menu1 = new Menu();
        $menu1->setName("Menu1");
        $menu1->setDescription("Direct menu for demo use");
        $menu1->setRank(1);
        $menu1->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $menu1->setRole($roleRepository->findBt(["name" => "public"]));
        $manager->persist($menu1);

        $menu1 = new Menu();
        $menu1->setName("Menu1");
        $menu1->setDescription("Direct menu for demo use");
        $menu1->setRank(1);
        $menu1->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $menu1->setRole($roleRepository->findBt(["name" => "public"]));
        $manager->persist($menu1);

        $content1 = newContent();
        $content1->setName('Content1');
        $content1->setDescrition("Demo content 1 for demo use");
        $content1->setTitle("Liken Factory");
        $content1->setSubTitle("Liken Factory demo content");
        $content1->setPage("
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel mi sit amet quam ultrices iaculis. Fusce sed sapien molestie, finibus ligula a, vehicula neque. Maecenas non sem ante. Cras rutrum magna vel orci vehicula tristique. Donec non velit id elit consectetur pharetra. Cras non aliquam nisi. Fusce aliquet a metus eget vulputate. Phasellus tincidunt arcu non nulla tincidunt ornare. Nam posuere auctor purus ut venenatis. Etiam aliquam lorem id lectus sodales porta. Curabitur turpis nisl, ornare nec dignissim sit amet, pretium vitae nulla. Nam sit amet bibendum nunc. Vestibulum eget enim finibus, maximus tellus id, vestibulum magna. Proin ac condimentum ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
        <div>Suspendisse potenti. Donec quis elit ac ligula egestas consectetur. Aliquam convallis odio vel rutrum aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus egestas quam a tempor laoreet. Sed at tortor eu velit sollicitudin efficitur. Ut tempor elit in velit hendrerit, id ullamcorper lectus lobortis. Nam euismod facilisis pharetra. Vestibulum congue, libero et pellentesque luctus, urna elit auctor ligula, ut euismod felis risus id mi.</div>     
        <div>Aliquam erat volutpat. Nulla sed tristique quam. Mauris dictum egestas eleifend. Phasellus ultricies malesuada ex id accumsan. Suspendisse ac malesuada neque. Aenean enim orci, viverra nec congue nec, imperdiet quis lorem. Mauris venenatis placerat velit id tempus. Nullam tincidunt facilisis massa, quis posuere urna cursus dapibus. Nunc tristique elementum massa, non malesuada nibh efficitur sed. Sed nec rutrum purus. Praesent placerat ipsum a congue tincidunt. Etiam ultricies in urna eget commodo. Duis non metus aliquet purus auctor aliquam.</div>
        ");
        $content1->setOwner($userRepository->findBy(["email" => "webmaster@likenfactory.com"]));
        $content1->setRole($roleRepository->fincBy(["name" => "public"]));
        $content1->setMenu($menuRepository->findBy(["name" => "Menu1"]));
        $manager->persist($content1);

        $menu2 = new Menu();
        $menu2->setName("Menu2");
        $menu2->setDescription("Menu with Sub Menu for demo use");
        $menu2->setRank(2);
        $menu2->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $menu2->setRole($roleRepository->findBt(["name" => "public"]));
        $manager->persist($menu2);

        $menu3 = new Menu();
        $menu3->setName("Menu3");
        $menu1->setDescription("Menu with Sub Menu and Sub Sub Menu for demo use");
        $menu3->setRank(3);
        $menu3->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $menu3->setRole($roleRepository->findBt(["name" => "public"]));
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setName("Menu4");
        $menu4->setDescription("Direct menu with provate role for demo use");
        $menu4->setRank(4);
        $menu4->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $menu4->setRole($roleRepository->findBt(["name" => "private"]));
        $manager->persist($menu4);

        $subMenu1 = new SubMenu();
        $subMenu1->setName("SubMenu1");
        $subMenu1->setDescription("SubMenu1 for demo use");
        $subMenu1->setRank("1");
        $subMenu1->setOwner($userRepository->findBy(["email" => "webmaser@likaenfactory.com"]));
        $subMenu1->setRole($roleRepository->findBt(["name" => "public"]));
        $subMenu1->setMenu($menuRepository->findBy(["name" => "Menu2"]));

        $content2 = newContent();
        $content2->setName('Content2');
        $content2->setDescrition("Demo content 2 for demo use");
        $content2->setTitle("Liken Factory");
        $content2->setSubTitle("Liken Factory demo content");
        $content2->setPage("
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel mi sit amet quam ultrices iaculis. Fusce sed sapien molestie, finibus ligula a, vehicula neque. Maecenas non sem ante. Cras rutrum magna vel orci vehicula tristique. Donec non velit id elit consectetur pharetra. Cras non aliquam nisi. Fusce aliquet a metus eget vulputate. Phasellus tincidunt arcu non nulla tincidunt ornare. Nam posuere auctor purus ut venenatis. Etiam aliquam lorem id lectus sodales porta. Curabitur turpis nisl, ornare nec dignissim sit amet, pretium vitae nulla. Nam sit amet bibendum nunc. Vestibulum eget enim finibus, maximus tellus id, vestibulum magna. Proin ac condimentum ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
        <div>Suspendisse potenti. Donec quis elit ac ligula egestas consectetur. Aliquam convallis odio vel rutrum aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus egestas quam a tempor laoreet. Sed at tortor eu velit sollicitudin efficitur. Ut tempor elit in velit hendrerit, id ullamcorper lectus lobortis. Nam euismod facilisis pharetra. Vestibulum congue, libero et pellentesque luctus, urna elit auctor ligula, ut euismod felis risus id mi.</div>     
        <div>Aliquam erat volutpat. Nulla sed tristique quam. Mauris dictum egestas eleifend. Phasellus ultricies malesuada ex id accumsan. Suspendisse ac malesuada neque. Aenean enim orci, viverra nec congue nec, imperdiet quis lorem. Mauris venenatis placerat velit id tempus. Nullam tincidunt facilisis massa, quis posuere urna cursus dapibus. Nunc tristique elementum massa, non malesuada nibh efficitur sed. Sed nec rutrum purus. Praesent placerat ipsum a congue tincidunt. Etiam ultricies in urna eget commodo. Duis non metus aliquet purus auctor aliquam.</div>
        ");
        $content2->setOwner($userRepository->findBy(["email" => "webmaster@likenfactory.com"]));
        $content2->setRole($roleRepository->fincBy(["name" => "public"]));
        $content2->setSubMenu($subMenuRepository->findBy(["name" => "SubMenu1"]));
        $manager->persist($content1);

        $subMenu2 = new SubMenu();
        $subMenu2->setName("SubMenu2");
        $subMenu2->setDescription("SubMenu2 for demo use");
        $subMenu2->setRank("2");
        $subMenu2->setOwner($userRepository->findBy(["email" => "webmaster@likaenfactory.com"]));
        $subMenu2->setRole($roleRepository->findBt(["name" => "public"]));
        $subMenu2->setMenu($menuRepository->findBy(["name" => "Menu2"]));

        $manager->flush();
    }
}
