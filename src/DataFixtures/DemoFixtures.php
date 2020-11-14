<?php

namespace App\DataFixtures;

use App\Entity\Content;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Menu;
use App\Entity\SubMenu;
use App\Entity\SubSubMenu;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use App\Repository\MenuRepository;
use App\Repository\SubMenuRepository;
use App\Repository\SubSubMenuRepository;
use App\Repository\ContentRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DemoFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        MenuRepository $menuRepository,
        SubMenuRepository $subMenuRepository,
        SubSubMenuRepository $subSubMenuRepository,
        ContentRepository $contentRepository)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->menuRepository = $menuRepository;
        $this->subMenuRepository = $subMenuRepository;
        $this->subSubMenuRepository = $subSubMenuRepository;
        $this->contentRepository = $contentRepository;
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
        $user1->setCreatedAt(new \DateTime('now'));
        $manager->persist($user1);
        
        $user2 = new User();
        $user2->setEmail("webmaster@likenfactory.com");
        $user2->setRoles(["ROLE_USER"]);
        $user2->setPassword($this->passwordEncoder->encodePassword(
        $user2,
        "webmaster"
        ));
        $user2->setCreatedAt(new \DateTime('now'));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail("dummyy@likenfactory.com");
        $user3->setRoles(["ROLE_USER"]);
        $user3->setPassword($this->passwordEncoder->encodePassword(
        $user3,
        "dummy"
        ));
        $user3->setCreatedAt(new \DateTime('now'));
        $manager->persist($user3);

        $manager->flush();

        $role1 = new Role;
        $role1->setName("public");
        $role1->setDescription("Public role for demo use");
        $role1->setCreatedAt(new \DateTime('now'));
        $manager->persist($role1);

        $role2 = new Role;
        $role2->setName("private");
        $role2->setDescription("Private role for demo use");
        $role2->setCreatedAt(new \DateTime('now'));
        $manager->persist($role2);

        $role3 = new Role;
        $role3->setName("webmaster");
        $role3->setDescription("Webmaster role for demo use");
        $role3->setCreatedAt(new \DateTime('now'));;
        $manager->persist($role3);

        $role4 = new Role;
        $role4->setName("admin");
        $role4->setDescription("Admin role for demo use");
        $role4->setCreatedAt(new \DateTime('now'));
        $manager->persist($role4);
    
        $manager->flush();

        $menu1 = new Menu();
        $menu1->setName("Menu1");
        $menu1->setDescription("Direct menu for demo use");
        $menu1->setRank(1);
        $menu1->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $menu1->setRole($this->roleRepository->findOneByName("public"));
        $menu1->setCreatedAt(new \DateTime('now')); 
        $manager->persist($menu1);

        $menu2 = new Menu();
        $menu2->setName("Menu2");
        $menu2->setDescription("With Sub Menu 1 for demo use");
        $menu2->setRank(2);
        $menu2->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $menu2->setRole($this->roleRepository->findOneByName("public"));
        $menu2->setCreatedAt(new \DateTime('now'));      
        $manager->persist($menu2);

        $menu3 = new Menu();
        $menu3->setName("Menu3");
        $menu3->setDescription("Private menu with Sub Menu 2 and Sub Sub Menu 1 for demo use");
        $menu3->setRank(3);
        $menu3->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $menu3->setRole($this->roleRepository->findOneByName("private"));
        $menu3->setCreatedAt(new \DateTime('now'));
        $manager->persist($menu3);

        $menu4 = new Menu();
        $menu4->setName("Menu4");
        $menu4->setDescription("Admin Menu for demo use");
        $menu4->setRank(4);
        $menu4->setOwner($this->userRepository->findOneByEmail("admin@likenfactory.com"));
        $menu4->setRole($this->roleRepository->findOneByName("admin"));
        $menu4->setCreatedAt(new \DateTime('now'));
        $manager->persist($menu4);

        $manager->flush();

        $subMenu1 = new SubMenu();
        $subMenu1->setName("SubMenu1");
        $subMenu1->setDescription("SubMenu1 for demo use");
        $subMenu1->setRank("1");
        $subMenu1->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $subMenu1->setRole($this->roleRepository->findOneByName("public"));
        $subMenu1->setMenu($this->menuRepository->findOneByName("Menu2"));
        $subMenu1->setCreatedAt(new \DateTime('now'));
        $manager->persist($subMenu1);

        $subMenu2 = new SubMenu();
        $subMenu2->setName("SubMenu2");
        $subMenu2->setDescription("SubMenu2 for demo use");
        $subMenu2->setRank("2");
        $subMenu2->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $subMenu2->setRole($this->roleRepository->findOneByName("private"));
        $subMenu2->setMenu($this->menuRepository->findOneByName("Menu3"));
        $subMenu2->setCreatedAt(new \DateTime('now'));
        $manager->persist($subMenu2);

        $manager->flush();

        $subSubMenu1 = new SubSubMenu();
        $subSubMenu1->setName("SubSubMenu1");
        $subSubMenu1->setDescription("SubSubMenu1 for demo use");
        $subSubMenu1->setRank("1");
        $subSubMenu1->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $subSubMenu1->setRole($this->roleRepository->findOneByName("private"));
        $subSubMenu1->setMenu($this->menuRepository->findOneByName("Menu3"));
        $subSubMenu1->setSubMenu($this->subMenuRepository->findOneByName("SubMenu2"));
        $subSubMenu1->setCreatedAt(new \DateTime('now'));
        $manager->persist($subSubMenu1);

        $manager->flush();

        $content1 = new Content();
        $content1->setName("Content1");
        $content1->setTitle("Content1");
        $content1->setSubTitle("Liken Factory demo content");
        $content1->setDescription("Demo content 1 for demo use");
        $content1->setPage("
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel mi sit amet quam ultrices iaculis. Fusce sed sapien molestie, finibus ligula a, vehicula neque. Maecenas non sem ante. Cras rutrum magna vel orci vehicula tristique. Donec non velit id elit consectetur pharetra. Cras non aliquam nisi. Fusce aliquet a metus eget vulputate. Phasellus tincidunt arcu non nulla tincidunt ornare. Nam posuere auctor purus ut venenatis. Etiam aliquam lorem id lectus sodales porta. Curabitur turpis nisl, ornare nec dignissim sit amet, pretium vitae nulla. Nam sit amet bibendum nunc. Vestibulum eget enim finibus, maximus tellus id, vestibulum magna. Proin ac condimentum ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
        <div>Suspendisse potenti. Donec quis elit ac ligula egestas consectetur. Aliquam convallis odio vel rutrum aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus egestas quam a tempor laoreet. Sed at tortor eu velit sollicitudin efficitur. Ut tempor elit in velit hendrerit, id ullamcorper lectus lobortis. Nam euismod facilisis pharetra. Vestibulum congue, libero et pellentesque luctus, urna elit auctor ligula, ut euismod felis risus id mi.</div>     
        <div>Aliquam erat volutpat. Nulla sed tristique quam. Mauris dictum egestas eleifend. Phasellus ultricies malesuada ex id accumsan. Suspendisse ac malesuada neque. Aenean enim orci, viverra nec congue nec, imperdiet quis lorem. Mauris venenatis placerat velit id tempus. Nullam tincidunt facilisis massa, quis posuere urna cursus dapibus. Nunc tristique elementum massa, non malesuada nibh efficitur sed. Sed nec rutrum purus. Praesent placerat ipsum a congue tincidunt. Etiam ultricies in urna eget commodo. Duis non metus aliquet purus auctor aliquam.</div>
        ");
        $content1->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $content1->setRole($this->roleRepository->findOneByName("public"));
        $content1->setMenu($this->menuRepository->findOneByName("Menu1"));
        $content1->setCreatedAt(new \DateTime('now'));
        $manager->persist($content1);

        $content2 = new Content();
        $content2->setName("Content2");
        $content2->setTitle("Content2");
        $content2->setSubTitle("Liken Factory demo content");
        $content2->setDescription("Demo content 2 for demo use");
        $content2->setPage("
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel mi sit amet quam ultrices iaculis. Fusce sed sapien molestie, finibus ligula a, vehicula neque. Maecenas non sem ante. Cras rutrum magna vel orci vehicula tristique. Donec non velit id elit consectetur pharetra. Cras non aliquam nisi. Fusce aliquet a metus eget vulputate. Phasellus tincidunt arcu non nulla tincidunt ornare. Nam posuere auctor purus ut venenatis. Etiam aliquam lorem id lectus sodales porta. Curabitur turpis nisl, ornare nec dignissim sit amet, pretium vitae nulla. Nam sit amet bibendum nunc. Vestibulum eget enim finibus, maximus tellus id, vestibulum magna. Proin ac condimentum ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
        <div>Suspendisse potenti. Donec quis elit ac ligula egestas consectetur. Aliquam convallis odio vel rutrum aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus egestas quam a tempor laoreet. Sed at tortor eu velit sollicitudin efficitur. Ut tempor elit in velit hendrerit, id ullamcorper lectus lobortis. Nam euismod facilisis pharetra. Vestibulum congue, libero et pellentesque luctus, urna elit auctor ligula, ut euismod felis risus id mi.</div>     
        <div>Aliquam erat volutpat. Nulla sed tristique quam. Mauris dictum egestas eleifend. Phasellus ultricies malesuada ex id accumsan. Suspendisse ac malesuada neque. Aenean enim orci, viverra nec congue nec, imperdiet quis lorem. Mauris venenatis placerat velit id tempus. Nullam tincidunt facilisis massa, quis posuere urna cursus dapibus. Nunc tristique elementum massa, non malesuada nibh efficitur sed. Sed nec rutrum purus. Praesent placerat ipsum a congue tincidunt. Etiam ultricies in urna eget commodo. Duis non metus aliquet purus auctor aliquam.</div>
        ");
        $content2->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $content2->setRole($this->roleRepository->findOneByName("public"));
        $content2->setSubMenu($this->subMenuRepository->findOneByName("SubMenu2"));
        $content2->setCreatedAt(new \DateTime('now'));
        $manager->persist($content2);

        $content3 = new Content();
        $content3->setName("Content3");
        $content3->setTitle("Content3");
        $content3->setSubTitle("Liken Factory demo content");
        $content3->setDescription("Demo content 3 for demo use");
        $content3->setPage("
        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel mi sit amet quam ultrices iaculis. Fusce sed sapien molestie, finibus ligula a, vehicula neque. Maecenas non sem ante. Cras rutrum magna vel orci vehicula tristique. Donec non velit id elit consectetur pharetra. Cras non aliquam nisi. Fusce aliquet a metus eget vulputate. Phasellus tincidunt arcu non nulla tincidunt ornare. Nam posuere auctor purus ut venenatis. Etiam aliquam lorem id lectus sodales porta. Curabitur turpis nisl, ornare nec dignissim sit amet, pretium vitae nulla. Nam sit amet bibendum nunc. Vestibulum eget enim finibus, maximus tellus id, vestibulum magna. Proin ac condimentum ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</div>
        <div>Suspendisse potenti. Donec quis elit ac ligula egestas consectetur. Aliquam convallis odio vel rutrum aliquet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus egestas quam a tempor laoreet. Sed at tortor eu velit sollicitudin efficitur. Ut tempor elit in velit hendrerit, id ullamcorper lectus lobortis. Nam euismod facilisis pharetra. Vestibulum congue, libero et pellentesque luctus, urna elit auctor ligula, ut euismod felis risus id mi.</div>     
        <div>Aliquam erat volutpat. Nulla sed tristique quam. Mauris dictum egestas eleifend. Phasellus ultricies malesuada ex id accumsan. Suspendisse ac malesuada neque. Aenean enim orci, viverra nec congue nec, imperdiet quis lorem. Mauris venenatis placerat velit id tempus. Nullam tincidunt facilisis massa, quis posuere urna cursus dapibus. Nunc tristique elementum massa, non malesuada nibh efficitur sed. Sed nec rutrum purus. Praesent placerat ipsum a congue tincidunt. Etiam ultricies in urna eget commodo. Duis non metus aliquet purus auctor aliquam.</div>
        ");
        $content3->setOwner($this->userRepository->findOneByEmail("webmaster@likenfactory.com"));
        $content3->setRole($this->roleRepository->findOneByName("public"));
        $content3->setSubSubMenu($this->subSubMenuRepository->findOneByName("SubSubMenu1"));
        $content3->setCreatedAt(new \DateTime('now'));
        $manager->persist($content3);

        $manager->flush();
    }
}
