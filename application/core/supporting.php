<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 01.03.2018
 * Time: 22:20
 */

function outComments($article) {
	$comments = $article['comments'];
	foreach ($comments as $comment) {
		if ($comment['parent_id'] == 0) {
			echo 'parent ';
			include('application/views/comment-view.php');
			outTree(0, $comments, $comment, 1);
		}
	}
}

function outTree($parent_id, $comments, $comment, $level) {

	//если есть чайлд
	$parent_id = $comment['comment_id'];

	foreach ($comments as $comment) {
		if ($comment['parent_id'] == $parent_id) {
//			echo 'child ';
			print_r($comment);
			echo 'parent_id =  '.$parent_id.'<br>';
			echo $level;
			include('application/views/comment-view.php');
			$level++;
			outTree($parent_id, $comments, $comment, $level);
		}
	}
}

//function outComments($article){
//	foreach ($article['comments'] as $comment) {
//		//есть родительские
//		if ($comment['parent_id'] == 0) {
//			$level = 0;
//			outTree($comment, $article['comments'], $level);
//		}
//	}
//}
//
//function outTree($comment, $comments, $level) {
////	print_r($comment);
//	include('application/views/comment-view.php');
//	$comment_id = $comment['comment_id'];
//
////if ($level > 10) {
////	exit();
////}
//	//если есть чайлд
//	foreach ($comments as $comment) {
//		if ($comment['parent_id'] == $comment_id) {
//			$level++;
//			outTree($comment, $comments, $level);
//		}
//	}
//}

function translit($s) {
	$s = (string) $s; // преобразуем в строковое значение
	$s = strip_tags($s); // убираем HTML-теги
	$s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
	$s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
	$s = trim($s); // убираем пробелы в начале и конце строки
	$s = mb_strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
	$s = strtr($s, array(
		'а' => 'a',
		'б' => 'b',
		'в' => 'v',
		'г' => 'g',
		'д' => 'd',
		'е' => 'e',
		'ё' => 'e',
		'ж' => 'j',
		'з' => 'z',
		'и' => 'i',
		'й' => 'y',
		'к' => 'k',
		'л' => 'l',
		'м' => 'm',
		'н' => 'n',
		'о' => 'o',
		'п' => 'p',
		'р' => 'r',
		'с' => 's',
		'т' => 't',
		'у' => 'u',
		'ф' => 'f',
		'х' => 'h',
		'ц' => 'c',
		'ч' => 'ch',
		'ш' => 'sh',
		'щ' => 'shch',
		'ы' => 'y',
		'э' => 'e',
		'ю' => 'yu',
		'я' => 'ya',
		'ъ' => '',
		'ь' => ''
	));
//		$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
	$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус

	return $s; // возвращаем результат
}