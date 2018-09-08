-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 13 2018 г., 17:34
-- Версия сервера: 5.7.22-0ubuntu0.16.04.1
-- Версия PHP: 7.2.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`article_id`, `title`, `author`, `date`, `text`) VALUES
(3, 'Lorem ipsum', 1, '2018-04-03', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus accusantium animi aspernatur consequuntur dicta eligendi et eveniet ex, illo necessitatibus quam quisquam ratione, reiciendis saepe sequi, sunt totam voluptas. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusamus accusantium animi aspernatur consequuntur dicta eligendi et eveniet ex, illo necessitatibus quam quisquam ratione, reiciendis saepe sequi, sunt totam voluptas.\r\n\r\n'),
(4, 'Another fake article', 1, '2018-04-04', 'Ferri suavitate efficiantur et mel, veniam offendit ex eum. Cu duo quod rebum iusto. Eos populo persequeris ea. In amet eirmod pri, eu suas audire apeirian mea.\r\nEa tritani maiorum copiosae usu, te partem aliquip voluptatibus mea. Aeque oportere pri ne, definiebas interesset id pro. Sit eleifend splendide te, sea iusto dignissim ne. Eos utinam graecis iudicabit ad. Illud reprehendunt quo id, in nec elit evertitur consetetur. Eum nisl justo cu, invidunt singulis pri at.\r\nNostrum euripidis necessitatibus ei vis. Eu quando eripuit interpretaris per, quot reque alterum sit ne. Nam impedit mediocritatem ea. Tollit iracundia qui ut, cu fuisset mentitum sit. Duo pertinacia interpretaris ne, vim esse fuisset id. Per te hinc nemore.'),
(5, 'Mystery Stingray devices discovered in Washington', 1, '2018-04-04', 'Spy kits that can track mobile phones and intercept calls and messages have been discovered in Washington and beyond, the US government has said.\r\nThe Department of Homeland Security (DHS) says it has observed "anomalous activity" consistent with the use of so-called stingrays.\r\nThey could be used by foreign spies or criminals, although the DHS said it did not know who was using them.\r\nIt added that such devices pose a "growing risk".\r\nStingrays, a brand name for a type of International Mobile Subscriber Identity catcher (IMSI), are mobile phone surveillance devices that mimic mobile phone towers.\r\nThe size of a briefcase, the devices send out signals to trick mobile phones into transmitting their location and identifying information.\r\nAs well as tracking the mobile phone of a suspect, the devices also gather information about phones of bystanders who are nearby.\r\nIt is believed to be the first time the US government has acknowledged the use of rogue spying devices in Washington.'),
(6, 'The whales who love to sing in the dark', 1, '2018-04-04', 'Beneath the Arctic sea ice, in the blanket of Januars polar night, bowhead whales most prefer to sing.\r\nWhile the songs of humpback whales have long received the most attention, it turns out that their baleen cousins could have a far greater repertoire.\r\nA study of a bowhead population near Svalbard has shown that their musical calls may be as varied as those of songbirds.\r\nThis would make them unique among whale populations, and possibly even mammals.\r\nWhalesong mixtape\r\nOver the course of three years, the whales of the Spitsbergen population produced 184 unique song types. The vocalisations were detected 24 hours a day throughout most of the winter each year.\r\n"The alphabet for the bowhead has got thousands of letters as far as we can tell," Prof Kate Stafford, lead author of the study published in the Proceedings of the Royal Society, told BBC News.\r\n"I really think of humpback whale songs as being like classical music. Very ordered. They might last 20 - 30 minutes. An individual [bowhead] song might only be 45 seconds to 2 minutes long, but theyll repeat that song over and over again," she added.'),
(7, 'Curiosity rover: 2,000 days on Mars', 1, '2018-04-04', 'Nass Curiosity rover, also known as the Mars Science Laboratory (MSL), is celebrating 2,000 martian days (sols) investigating Gale Crater on the Red Planet. In that time, the robot has made some remarkable observations. Here are just a few of them, chosen by the Curiosity science team.\r\nLooking back: In the history of the space age, some of the most dramatic planetary images ever taken have been of Earth, but photographed looking back from deep space. This image by Mastcam on the Curiosity Rover shows our planet as a faint pinpoint of light in the martian night sky. Every day scientists from across the world drive the Curiosity rover and study the Red Planet about 100 million miles from Earth.\r\nThe beginning: The first image that Curiosity took came back just 15 minutes after landing on 5 August 2012. Getting our imagery and other data relies on the timing of Mars Reconnaissance Orbiter (MRO) overpasses, a pattern which determines the structure of the martian working day, or sol. It shows a grainy Front Hazard Camera image - the team normally use these to help avoid obstacles - of our ultimate goal Mount Sharp. When this image came back we knew it was going to be a successful mission.\r\nRiver pebbles: Once we had started driving (16 sols after landing), we soon came across these pebble beds. The rounded shape of the clasts shows that they formed in an ancient, shallow river, flowing from the surrounding four-billion-year-old highlands into Gale Crater. The inset Mastcam image shows one of the pebbles in close-up. Contrary to our expectations before MSL, the crust being eroded by the rivers was not all dark, primitive basalt but a more evolved composition and mineralogy. Pebbles caught up in this ancient martian river are causing us to rethink our view of how the underlying igneous crust and mantle of Mars formed.'),
(8, 'How babies learn and why robots cat compete', 1, '2018-04-04', 'Deb Roy and Rupal Patel pulled into their driveway on a fine July day in 2005 with the beaming smiles and sleep-deprived glow common to all first-time parents. Pausing in the hallway of their Boston home for Grandpa to snap a photo, they chattered happily over the precious newborn son swaddled between them.\r\nThis normal-looking suburban couple werent exactly like other parents. Roy was an AI and robotics expert at MIT, Patel an eminent speech and language specialist at nearby Northeastern University. For years, they had been planning to amass the most extensive home-video collection ever.\r\nLose yourself in a great story: Sign up for the long read email\r\nFrom the ceiling in the hallway blinked two discreet black dots, each the size of a coin. Further dots were located over the open-plan living area and the dining room. There were 25 in total throughout the house 14 microphones and 11 fish-eye cameras, part of a system primed to launch on their return from hospital, intended to record the newborns every move.\r\nIt had begun a decade earlier in Canada but in fact Roy had built his first robots when he was just was six years old, back in Winnipeg in the 1970s, and hed never really stopped. As his interest turned into a career, he wondered about android brains. What would it take for the machines he made to think and talk? I thought I could just read the literature on how kids do it, and that would give me a blueprint for building my language and learning robots, Roy told me.\r\nOver dinner one night, he boasted to Patel, who was then completing her PhD in human speech pathology, that he had already created a robot that was learning the same way kids learn. He was convinced that if it got the sort of input children get, the robot could learn from it.\r\nToco was little more than a camera and microphone mounted on a Meccano frame, and given character with ping-pong-ball eyes, a red feather quiff and crooked yellow bill. But it was smart. Using voice recognition and pattern-analysing algorithms, Roy had painstakingly taught Toco to distinguish words and concepts within the maelstrom of everyday speech. Where previously computers learned language digitally, understanding words in relation to other words, Roys breakthrough was to create a machine that understood their relationship to objects. Asked to pick out the red ball among a range of physical items, Toco could do it.'),
(9, 'Theo Randalls recipe for spaghetti with courgettes, onions and basil', 1, '2018-04-04', 'I was told about this recipe by a friend who comes from Naples. He described this dish with such passion that I had to cook it that same evening. You dont have to use courgette flowers but it does look great with them. Spaghetti works really well but you could use a short pasta like penne rigate or fusilli instead.\r\n\r\n(Serves 4 as a starter)\r\n\r\n4 tbsp olive oil\r\n2 medium-sized white onions, cut into thin slices\r\n4 courgettes, cut into 1cm rounds\r\n8 basil leaves\r\nSalt and pepper\r\n300g spaghetti\r\n4 courgette flowers, ripped into strips\r\n2 egg yolks\r\n100g parmesan cheese, grated\r\n\r\nCook the onions slowly in a saucepan with two tablespoons of olive oil for 20 minutes until soft but not coloured. Use the remaining two tablespoons of oil to fry the courgettes in a frying pan for 20 minutes until soft. Add the basil leaves so the courgettes absorb their flavour. Season and take off the heat but leave the courgettes in the pan.\r\n\r\nAdd the spaghetti to a pot of salted boiling water and cook for two minutes less than the packet suggests. Remove the spaghetti from the pot with a pair of tongs and add to the frying pan with the courgettes and one ladle of pasta water. Place the frying pan back on the stove and add the onions and courgette flowers to the pasta. Cook for a couple of minutes.\r\n\r\nIn a bowl beat up the egg yolks and parmesan cheese, and pour into the pan with the spaghetti, courgettes, onions and basil. Toss well and add a little more pasta water so it remains creamy.\r\n\r\nServe in hot bowls with black pepper and a little grated parmesan on the side.');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `article_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment_text` varchar(255) DEFAULT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`article_id`, `parent_id`, `comment_id`, `comment_text`, `author`) VALUES
(3, 0, 1, 'First comment', 1),
(3, 1, 2, 'nested comment', 1),
(3, 2, 3, 'nested comment in the nesded comment??', 1),
(3, 1, 4, 'another nested comment', 1),
(3, 3, 5, 'stop it', 1),
(3, 3, 6, 'Im serious', 1),
(3, 5, 7, 'why?', 1),
(9, 0, 8, 'Ive always wondered what the correct pronounciation of the word basil is - personally ive always pronounced it baesil ( similar to dazzle) whereas most people pronounce it beisil (similar to hazel) - just wondering.. my mum, whos English, prono', 1),
(5, 0, 9, 'test', 1),
(5, 9, 10, 'reply test', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `article_id` int(11) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`article_id`, `img_path`) VALUES
(4, 'uploads/lorem-ipsum-filler-text.png'),
(4, 'uploads/universal-placeholder-text-lorem-ipsum-generator-getlorem.jpg'),
(5, 'uploads/_100695634_mobilemast.gif'),
(6, 'uploads/whale.jpg'),
(7, 'uploads/_100518879_9c24d308-b7e0-481d-ae08-33ce81a696ad.jpg'),
(7, 'uploads/_100518880_80384621-6161-4d43-bdd1-9901153ed777.jpg'),
(8, 'uploads/2429.jpg'),
(9, 'uploads/3728.jpg'),
(6, 'uploads/250px-southern_right_whale.jpg'),
(6, 'uploads/thjc-humback-nat-geo.jpg'),
(6, 'uploads/maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`article_id`, `user_id`) VALUES
(3, 1),
(5, 1),
(9, 2),
(9, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`article_id`, `tag_id`) VALUES
(3, 2),
(3, 3),
(3, 4),
(4, 5),
(4, 2),
(4, 6),
(5, 7),
(5, 8),
(7, 9),
(8, 10),
(9, 11),
(9, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `tag_name`
--

CREATE TABLE `tag_name` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag_name`
--

INSERT INTO `tag_name` (`tag_id`, `tag_name`) VALUES
(1, '1'),
(2, 'Lorem'),
(3, 'Ipsum'),
(4, 'text'),
(5, 'article'),
(6, 'fake'),
(7, 'Washington'),
(8, 'Mystery'),
(9, 'Mars'),
(10, 'Robots'),
(11, 'Food'),
(12, 'Spaghetti');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `name`, `position`, `login`, `password`) VALUES
(1, 'Konstantin', 'admin', 'admin', '$2y$10$aSrfFAlqMldcKHWRoh/NZexnQ1.0G/OCl/JPs2mZgtjJveYS8VSUW'),
(2, 'kon', 'user', 'kon', '$2y$10$mD2tkLA8v0tU3r289sBExO6WcTCFcgbnGDxdSs3cewdm7dq7Xd8J6'),
(3, 'kon', 'user', 'konkon', '$2y$10$usCV/e4V51frwTRbZxpw6ePeADYiHAG1RWg263yWbtdpfCYUeufmu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `tag_name`
--
ALTER TABLE `tag_name`
  ADD PRIMARY KEY (`tag_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `tag_name`
--
ALTER TABLE `tag_name`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tag_name` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
