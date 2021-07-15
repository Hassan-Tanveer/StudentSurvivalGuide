-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 07:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentsurvivalguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `BudgetID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Budget` int(20) NOT NULL,
  `Start_Date` date NOT NULL,
  `Expiry_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`BudgetID`, `User_ID`, `Budget`, `Start_Date`, `Expiry_Date`) VALUES
(2, 3, 5000, '2019-12-31', '0000-00-00'),
(11, 1, 11500, '2020-07-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Event_Name` varchar(180) NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `User_ID`, `Event_Name`, `Start_Date`, `End_Date`) VALUES
(1, 1, 'TEST', '2020-07-27 00:00:00', '2020-07-28 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ExpenseID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `ExpenseName` varchar(30) NOT NULL,
  `Category` enum('Transport','Food & Drinks','Entertainment','Restaurants','Shopping','Housing','Other') NOT NULL,
  `Expense_Date` date NOT NULL,
  `Amount_Spent` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ExpenseID`, `User_ID`, `ExpenseName`, `Category`, `Expense_Date`, `Amount_Spent`) VALUES
(2, 1, 'T-Shirt and Clothes', 'Other', '2020-07-14', 35),
(3, 1, 'Bus Pass', 'Transport', '2020-07-15', 100),
(4, 3, 'Lunch', 'Food & Drinks', '2020-07-08', 25),
(5, 1, 'Groceries', 'Shopping', '2020-07-03', 45),
(6, 1, 'Cinema - Avengers', 'Entertainment', '2020-05-27', 15),
(7, 1, 'Jazz Club', 'Entertainment', '2020-08-25', 35),
(8, 3, 'Alexs Birthday Party', 'Other', '2020-04-03', 55),
(9, 3, 'Rent for Second Term', 'Housing', '2020-02-01', 1500),
(10, 3, 'Weekly Groceries Shop', 'Shopping', '2020-02-02', 65),
(11, 3, 'Travel Pass', 'Transport', '2020-02-10', 45),
(12, 3, 'Theatre Lion King Performance', 'Entertainment', '2020-04-15', 80),
(13, 3, 'test', 'Housing', '2020-08-08', 11);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(35) NOT NULL,
  `Body` longtext NOT NULL,
  `Recipe_Category` enum('Carnivore','Pescatarian','Vegetarian','Vegan') NOT NULL,
  `Skill_Level` enum('Easy','More Effort','Challenging') NOT NULL,
  `Post_Publicly` enum('Yes','No') NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `User_ID`, `Title`, `Body`, `Recipe_Category`, `Skill_Level`, `Post_Publicly`, `image_name`, `timestamp`, `updated_at`) VALUES
(1, 1, 'Micro Shakshuka', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>1 tbsp olive oil</li>\r\n	<li>200ml passata or canned tomatoes, whizzed to a paste</li>\r\n	<li>1 garlic clove, finely sliced</li>\r\n	<li>1 heaped tbsp red pepper salsa (we used Gran Luchito) or or &frac14;-&frac12; red pepperred pepper, chopped</li>\r\n	<li>1 medium egg</li>\r\n	<li>1 tbsp chopped coriander and pitta bread, to serve</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Brush a microwave bowl or dish with a little of the oil. Stir the passata, garlic and salsa together and season well. Tip into the bowl and make a dip in the centre. Break in the egg, then prick the yolk with the tip of a sharp knife.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cover the bowl with its lid or clingfilm. Microwave on high for 1 min, and then in 20 sec bursts until the white is set. Scatter over the coriander and serve with the warmed pitta.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><img alt=\"Shakshuka\" src=\"https://cookieandkate.com/images/2019/02/shakshuka-single-serving.jpg\" style=\"height:376px; width:250px\" /></p>\r\n', 'Vegetarian', 'Easy', 'Yes', 'Microwave Shakshuka.jpg', '2020-08-03 16:42:14', '2020-08-05 00:14:03'),
(2, 3, 'Quick Fish Curry', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>1 tbsp vegetable oil</li>\r\n	<li>1 large onion, chopped</li>\r\n	<li>1 garlic clove, chopped</li>\r\n	<li>1-2 tbsp Madras curry paste (we used Patak&#39;s)</li>\r\n	<li>400g can tomato</li>\r\n	<li>200ml vegetable stock</li>\r\n	<li>sustainable white fish fillets, skinned and cut into big chunks</li>\r\n	<li>rice or naan bread</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Heat the oil in a deep pan and gently fry the onion and garlic for about 5 mins until soft. Add the curry paste and stir-fry for 1-2 mins, then tip in the tomatoes and stock.</p>\r\n	</li>\r\n	<li>\r\n	<p>Bring to a simmer, then add the fish. Gently cook for 4-5 mins until the fish flakes easily. Serve immediately with rice or naan</p>\r\n	</li>\r\n</ol>\r\n', 'Pescatarian', 'Easy', 'Yes', 'Quick Fish Curry.jpg', '2020-08-03 16:58:34', '2020-08-05 00:56:32'),
(3, 1, 'Vegan Smoothie Bowl', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>50g&nbsp;spinach</li>\r\n	<li>1&nbsp;avocado, stoned, peeled and halved</li>\r\n	<li>1 ripe mango, stoned, peeled and cut into chunks</li>\r\n	<li>1&nbsp;apple, cored and cut into chunks</li>\r\n	<li>200ml almond milk</li>\r\n	<li>1 dragon fruit, peeled and cut into even chunks</li>\r\n	<li>100g mixed berries (we used strawberries, raspberries and blueberries)</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Put the <strong>spinach, avocado, mango, apple and almond milk </strong>in a blender, and blitz until smooth and thick. Divide between two bowls and top with the dragon fruit and berries.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><img alt=\"\" src=\"https://www.bbcgoodfood.com/sites/default/files/styles/carousel_medium/public/guide/guide-image/2019/01/smoothie-bowl-title-image.jpg?itok=Res8gKuB\" style=\"height:382px; width:468px\" /></p>\r\n', 'Vegan', 'Easy', 'Yes', 'Green rainbow smoothie bowl.jpg', '2020-08-03 19:31:43', '2020-08-05 00:15:46'),
(4, 7, 'Chicken Soup', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>1 tbsp&nbsp;olive oil</li>\r\n	<li>2&nbsp;onions, chopped</li>\r\n	<li>3 medium&nbsp;carrots, chopped</li>\r\n	<li>1 tbsp&nbsp;thyme&nbsp;leaves, roughly chopped</li>\r\n	<li>1.4l chicken stock</li>\r\n	<li>300g leftover roast&nbsp;chicken, shredded and skin removed</li>\r\n	<li>200g frozen peas</li>\r\n	<li>3 tbsp Greek yogurt</li>\r\n	<li>1 garlic clove, crushed</li>\r\n	<li>squeeze lemon juice</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Heat 1 tbsp olive oil in a large heavy-based pan. Add 2 chopped onions, 3 chopped medium carrots and 1 tbsp roughly chopped thyme leaves, then gently fry for 15 mins.</p>\r\n	</li>\r\n	<li>\r\n	<p>Stir in 1.4l chicken stock, bring to a boil, cover, then simmer for 10 mins.</p>\r\n	</li>\r\n	<li>\r\n	<p>Add 300g shredded leftover roast chicken, remove half the mixture, then pur&eacute;e with a stick blender.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Tip back into the pan with the rest of the soup, 200g frozen peas and seasoning, then simmer for 5 mins until hot through.</p>\r\n	</li>\r\n	<li>\r\n	<p>Mix 3 tbsp Greek yogurt,1 crushed garlic clove and a squeeze lemon juice, swirl into the soup in bowls, then serve.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>If you want to use a slow cooker</strong>, gently fry 2 chopped onions, 3 chopped medium carrots and1 tbsp roughly chopped thyme leaves for 15 mins then tip them with the veg into your slow cooker with 1 litre stock. If you&#39;re using a chicken carcass, add it now.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cover and cook for 2-3 hours on High until the veg is tender. If you used a carcass remove it now, shredding any remaining chicken from the bones.</p>\r\n	</li>\r\n	<li>\r\n	<p>Stir back into the soup, or add 300g shredded leftover roast chicken now, plus 200g frozen peas.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cook for 30 mins more. Remove half the mixture and pur&eacute;e with a stick blender, then serve as above.</p>\r\n	</li>\r\n</ol>\r\n', 'Carnivore', 'More Effort', 'Yes', 'Chicken Soup.jpg', '2020-08-03 22:26:37', '2020-08-05 00:15:17'),
(5, 1, 'Beef Burger', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>1 small onion, diced</li>\r\n	<li>500g good-quality beef mince</li>\r\n	<li>1 egg</li>\r\n	<li>1 tbsp vegetable oil</li>\r\n	<li>4 burger buns</li>\r\n	<li>All or any of the following to serve: sliced tomato, beetroot, horseradish sauce, mayonnaise, ketchup, handful iceberg lettuce, rocket, watercress</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Tip 500g beef mince into a bowl with 1 small diced onion and 1 egg, then mix.</p>\r\n	</li>\r\n	<li>\r\n	<p>Divide the mixture into four. Lightly wet your hands. Carefully roll the mixture into balls, each about the size of a tennis ball.</p>\r\n	</li>\r\n	<li>\r\n	<p>Set in the palm of your hand and gently squeeze down to flatten into patties about 3cm thick. Make sure all the burgers are the same thickness so that they will cook evenly.</p>\r\n	</li>\r\n	<li>\r\n	<p>Put on a plate, cover with cling film and leave in the fridge to firm up for at least 30 mins.</p>\r\n	</li>\r\n	<li>\r\n	<p>Heat the&nbsp;barbecue to medium hot (there will be white ash over the red hot coals - about 40 mins after lighting). Lightly brush 1 side of each burger with vegetable oil.</p>\r\n	</li>\r\n	<li>\r\n	<p>Place the burgers, oil-side down, on the barbecue. Cook for 5 mins until the meat is lightly charred. Don&#39;t move them around or they may stick.</p>\r\n	</li>\r\n	<li>\r\n	<p>Oil the other side, then turn over using tongs. Don&#39;t press down on the meat, as that will squeeze out the juices.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cook for 5 mins more for medium. If you like your burgers pink in the middle, cook 1 min less each side. For well done, cook 1 min more.</p>\r\n	</li>\r\n	<li>\r\n	<p>Take the burgers off the barbecue. Leave to rest on a plate so that all the juices can settle inside.</p>\r\n	</li>\r\n	<li>\r\n	<p>Slice 4 burger buns in half. Place, cut-side down, on the barbecue rack and toast for 1 min until they are lightly charred. Place a burger inside each bun, then top with your choice of accompaniment.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><img alt=\"\" src=\"https://www.bbcgoodfood.com/sites/default/files/styles/recipe/public/recipe_images/recipe-image-legacy-id--1035715_11.jpg?itok=urBA2ZBD\" /></p>\r\n', 'Carnivore', 'Easy', 'Yes', 'Beefy Burger.jpg', '2020-08-03 23:38:10', '2020-08-10 20:09:43'),
(6, 3, 'Chorizo Hummus Bowl', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>400g can chickpeas</li>\r\n	<li>2 tbsp&nbsp;olive oil</li>\r\n	<li>1/4 lemon, juiced</li>\r\n	<li>1-2 small cooking chorizo, chopped</li>\r\n	<li>2 handfuls chopped kale</li>\r\n	<li>flatbread, to serve</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Warm the chickpeas in a microwave or frying pan in their liquid. Drain and reserve the liquid. Tip half the chickpeas into a small food processor with 1 tbsp oil, the lemon juice and a splash of the liquid from the tin and whizz to a paste. Season.</p>\r\n	</li>\r\n	<li>\r\n	<p>Put the chorizo in a small frying pan and cook over a low heat until it starts to release its oils, then turn up the heat and continue cooking until the chorizo starts to crisp. Add the remaining chickpeas and stir for a couple of mins. Stir in the kale and cook until it wilts.</p>\r\n	</li>\r\n	<li>\r\n	<p>Spoon the warm hummus into a bowl and tip the chorizo, chickpeas and kale on top. Drizzle over the remaining oil, season well and serve with flatbread for scooping up.</p>\r\n	</li>\r\n</ol>\r\n', 'Carnivore', 'Easy', 'Yes', 'Chorizo Hummus Bowl.jpg', '2020-08-09 16:15:56', '2020-08-09 16:39:54'),
(7, 3, 'Cheap Veggie Pizza', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n	<li>200g carton passata</li>\r\n	<li>pack of 5 large Middle Eastern flatbreads</li>\r\n	<li>& 1/2 a 750g bag frozen spinach, defrosted</li>\r\n	<li>1 garlic clove, chopped</li>\r\n	<li>3 balls mozzarella, patted dry and torn</li>\r\n	<li>5 medium eggs</li>\r\n	<li>freshly grated nutmeg</li>\r\n	<li>small bunch basil</li>\r\n	<li>shaved parmesan (or vegetarian alternative), to serve</li>\r\n</ul>\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Heat the oven to as high as it will go. Spread 1-2 tbsp of passata over each flatbread. Squeeze as much water as you can from the spinach (this will prevent your pizzas from being soggy), then scatter on top, leaving a gap in the centre. Divide the garlic and mozzarella between the pizzas, seasoning generously as you go.</p>\r\n	</li>\r\n	<li>\r\n	<p>You will probably only be able to bake 2 pizzas at a time. So put 2 on a baking tray, carefully crack an egg into the middle of each, and season with nutmeg and some of the basil. Bake for 7 mins until the cheese has melted and the egg is cooked to your liking.</p>\r\n	</li>\r\n	<li>\r\n	<p>Repeat with the remaining pizzas and ingredients. Serve, garnished with a little more basil and some Parmesan. Cut into slices and share between everyone.</p>\r\n	</li>\r\n</ol>\r\n', 'Vegetarian', 'Easy', 'Yes', 'Cheap Veggie Pizza.jpg', '2020-08-09 16:26:05', '2020-08-09 16:40:55'),
(8, 7, 'Ultimate Fish Cakes', '<h2>Ingredients</h2>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h3><strong>For the tartare-style sauce</strong></h3>\r\n\r\n<ul>\r\n	<li>125ml mayonnaise</li>\r\n	<li>1 rounded tbsp capers, roughly chopped (rinsed and drained if salted)</li>\r\n	<li>1 rounded tsp creamed horseradish</li>\r\n	<li>1 rounded tsp Dijon mustard</li>\r\n	<li>1 small shallot, very finely chopped</li>\r\n	<li>1 tsp flatleaf parsley, finely chopped</li>\r\n</ul>\r\n\r\n<h3><strong>For the fish cakes</strong></h3>\r\n\r\n<ul>\r\n	<li>450g skinned Icelandic cod or haddock fillet, from a sustainable source</li>\r\n	<li>2 bay leaves</li>\r\n	<li>150ml milk</li>\r\n	<li>350g Maris Piper potatoes</li>\r\n	<li>1/2 tsp finely grated lemon zest</li>\r\n	<li>1 tbsp flatleaf parsley, chopped</li>\r\n	<li>1 tbsp snipped chives</li>\r\n	<li>1 egg</li>\r\n	<li>flour, for shaping</li>\r\n	<li>85g fresh white breadcrumbs, preferably a day or two old</li>\r\n	<li>3-4 tbsp vegetable or& sunflower oil, for shallow frying</li>\r\n	<li>lemon wedges and watercress, to serve</li>\r\n</ul>\r\n\r\n\r\n<h2>Method</h2>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Mix together 125ml mayonnaise, 1 rounded tbsp roughly chopped capers, 1 rounded tsp creamed horseradish, 1 rounded tsp Dijon mustard, 1 small very finley chopped shallot and 1 tsp finely chopped flatleaf parsley. Set aside.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lay 450g skinned Icelandic cod or haddock fillet and 2 bay leaves in a frying pan. Pour over 150ml milk and 150ml water.</p>\r\n	</li>\r\n	<li>\r\n	<p>Cover, bring to a boil, then lower the heat and simmer for 4 mins. Take off the heat and let stand, covered, for 10 mins to gently finish cooking the fish.</p>\r\n	</li>\r\n	<li>\r\n	<p>Meanwhile, peel and chop 350g Maris Piper potatoes into even-sized chunks. Put them in a saucepan and just cover with boiling water. Add a pinch of salt, bring back to the boil and simmer for 10 mins or until tender, but not broken up.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lift the fish out of the milk with a slotted spoon and put on a plate to cool. Drain the potatoes in a colander and leave for a min or two.</p>\r\n	</li>\r\n	<li>\r\n	<p>Tip the potatoes back into the hot pan on the lowest heat you can and let them dry out for 1 min, mashing them with a fork and stirring so they don\'t stick. You should have a light, dry fluffy mash.</p>\r\n	</li>\r\n	<li>\r\n	<p>Take off the heat and beat in 1 rounded tbsp of the sauce, then half a lemon zest, 1 tbsp chopped flatleaf parsley and 1 tbsp snipped chives.</p>\r\n	</li>\r\n	<li>\r\n	<p>Season well with salt and pepper. The potato should have a good flavour, so taste and adjust to suit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Drain off liquid from the fish, grind some pepper over it, then flake it into big chunks into the pan of potatoes.</p>\r\n	</li>\r\n	<li>\r\n	<p>Using your hands, gently lift the fish and potatoes together so they just mix. You\'ll only need a couple of turns, or the fish will break up too much. Put to one side and cool.</p>\r\n	</li>\r\n	<li>\r\n	<p>Beat 1 egg on a large plate and lightly flour a board. Spread 85g fresh white breadcrumbs on a baking sheet. Divide the fish cake mixture into four.</p>\r\n	</li>\r\n	<li>\r\n	<p>On the floured board, and with floured hands, carefully shape into four cakes, about 2.5cm thick. One by one, sit each cake in the egg, and brush over the top and sides so it is completely coated.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sit the cakes on the crumbs, patting the crumbs on the sides and tops so they are lightly covered. Transfer to a plate, cover and chill for 30 mins (or up to a day ahead).</p>\r\n	</li>\r\n	<li>\r\n	<p>Heat 3-4 tbsp vegetable or sunflower oil in a large frying pan. To test when ready, drop a piece of the dry breadcrumbs in - if it sizzles and quickly turns golden brown, it is ready to use.</p>\r\n	</li>\r\n	<li>\r\n	<p>Fry the fish cakes over a medium heat for about 5 mins on each side or until crisp and golden. Serve with the rest of the sauce (squeeze in a little lemon to taste), lemon wedges for squeezing over and watercress.</p>\r\n	</li>\r\n</ol>\r\n', 'Pescatarian', 'More Effort', 'Yes', 'Fish Cakes.jpg', '2020-08-09 16:33:07', '2020-08-09 16:47:22'),
(9, 3, ' Onion Bhaji Fish & Chips', '<h1>Ingredients</h1>\r\n\r\n<ul>\r\n	<li>sunflower oil, for deep frying</li>\r\n	<li>2 double lemon sole fillets or 2 x 150g fillets of other white fish</li>\r\n</ul>\r\n\r\n<h3><strong>For the batter</strong></h3>\r\n\r\n<ul>\r\n	<li>120g plain flour, plus extra for dusting the fish</li>\r\n	<li>7g sachet fast-action dried yeast</li>\r\n	<li>1/2 tsp onion seeds</li>\r\n	<li>1/2 tsp chilli powder</li>\r\n	<li>1/2 tsp ground cumin</li>\r\n	<li>1/2 tsp ground coriander</li>\r\n	<li>1/2 tsp garlic powder</li>\r\n	<li>1 small green chilli, finely chopped</li>\r\n	<li>small handful coriander leaves, finely chopped</li>\r\n	<li>150ml lager (I use Indian lager like Kingfisher)</li>\r\n	<li>1 small onion, very finely sliced</li>\r\n</ul>\r\n\r\n<h3><strong>For the chips</strong></h3>\r\n\r\n<ul>\r\n	<li>3 large potatoes, peeled and cut into wedges</li>\r\n	<li>2 tbsp sunflower oil</li>\r\n	<li>1 tbsp Madras curry powder</li>\r\n</ul>\r\n\r\n<h3><strong>To serve</strong></h3>\r\n\r\n<ul>\r\n	<li>curry salt and lime mayo</li>\r\n</ul>\r\n\r\n<h1>Method</h1>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Tip the flour, yeast, spices, chilli, coriander and a large pinch of salt into a bowl and stir together. Whisk in the lager until you have a smooth batter. Cover and set aside while you cook the chips.</p>\r\n	</li>\r\n	<li>\r\n	<p>Heat oven to 180C/160C fan/gas 4. Drizzle half the oil in a roasting tin and put in the oven to heat up. Tip the chips into a bowl and toss in the remaining oil, curry powder and a pinch of salt. Tip into the roasting tin and roast for 30 mins, then toss and carry on roasting until the chips are cooked through and crisp, around 15 mins more. Turn the oven down to 110C/90C fan/gas 1/4  to keep them warm.</p>\r\n	</li>\r\n	<li>\r\n	<p>Stir the onion into the batter, making sure all the slices are separated. Heat 10cm sunflower oil in a deep-fat fryer or pan of oil to 180C. Scatter some flour on a plate, dip the fish in the flour, pat off any excess, then dip into the batter, coating the fish with a generous amount of batter and onion. Carefully lower into the oil and sizzle for 5 mins until golden brown. Once cooked, drain off any excess oil, then carefully place on a tray lined with kitchen towel. Serve with the chips, seasoned with curry salt and lime mayo on the side for dipping</p>\r\n	</li>\r\n</ol>\r\n', 'Pescatarian', 'More Effort', 'Yes', 'Onion Bhaji Fish and Chips.jpg', '2020-08-09 16:37:50', '2020-08-09 16:46:53'),
(10, 3, 'Salt & Pepper Squid', '<h1>Ingredients</h1>\r\n\r\n<ul>\r\n	<li>400g large squid, or smaller ones totalling the same weight (the tentacles can be cooked alongside, if you want)</li>\r\n	<li>2-3 tbsp olive oil</li>\r\n	<li>1/2 tsp Chinese five spice powder</li>\r\n	<li>little sesame oil, to serve</li>\r\n	<li>few coriander sprigs, to serve</li>\r\n	<li>sweet chilli sauce, to serve</li>\r\n</ul>\r\n\r\n<h1>Method</h1>\r\n\r\n<ol>\r\n	<li>Ask the fishmonger to clean the squid; little ones often come ready-cleaned. Using kitchen scissors, cut open the body and open out. Wash well, then pat dry. If you have a large squid, cut the body into four portions, roughly square. Small squid can just be opened up.</li>\r\n	<li>Using the tip of a very sharp knife, score the top in a neat criss-cross. Brush with oil and set aside while you heat the barbecue or griddle until ready to cook.</li>\r\n	<li>Mix together 2 tsp sea salt, Chinese five-spice and 1 tsp freshly ground black pepper. Sprinkle on both sides of the squid just before cooking, according to taste. You may not need it all. Heat the griddle pan to hot and cook about 1 min each side, until it starts to curl. Remove with tongs to a serving plate and drizzle with a little sesame oil. To serve, garnish with coriander leaves and serve with small bowls of sweet chilli sauce to dip into.</li>\r\n</ol>\r\n', 'Pescatarian', 'Challenging', 'Yes', 'Salt and Pepper Squid.jpg', '2020-08-09 16:54:20', '2020-08-09 16:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `ListID` int(10) UNSIGNED NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`ListID`, `User_ID`, `Title`, `created_at`, `checked`) VALUES
(1, 1, 'Fix Calendar', '2020-08-15 12:32:29', 0),
(2, 1, 'Complete Report', '2020-08-15 14:02:35', 1),
(3, 1, 'Live Demo', '2020-08-15 14:05:15', 0),
(4, 1, 'Submit Code', '2020-08-15 14:05:33', 1),
(5, 1, 'Submit Report', '2020-08-15 14:05:39', 1),
(6, 1, 'Grocery Shopping on Monday', '2020-08-15 14:07:33', 0),
(7, 1, 'Buy Birthday Gifts', '2020-08-15 14:09:16', 0),
(8, 1, 'Buy Train Ticket', '2020-08-15 14:09:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Name`, `Email`, `Password`) VALUES
(1, 'Hassan Tanveer', 'admin@admin.com', '0192023a7bbd73250516f069df18b500'),
(2, 'Test', 'test@test.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(3, 'Jane Doe', 'JaneD@email.com', '5570c0cd80d575f9db152f9cc8bf1c6a'),
(4, 'John Doe', 'Johndoe@email.com', '6e0b7076126a29d5dfcbd54835387b7b'),
(7, 'Tim Cook', 'tcook@email.com', 'e75825a3f9af3dbd8e6b8a8d1a336028'),
(8, 'sjjobs', 'sjobs@email.com', 'ce58690bbc16e620555bea0fc12b26ba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`BudgetID`),
  ADD UNIQUE KEY `User_ID` (`User_ID`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ExpenseID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`ListID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `BudgetID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ExpenseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `ListID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `budget_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
