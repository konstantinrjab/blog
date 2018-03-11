<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 01.03.2018
 * Time: 22:20
 */

function outComments($comments, $parent_id, $level) {
	if($level > 10){
		exit();
	}
	print_r($comments);
	if (isset($comments['parent_id'])) {
		foreach ($comments['parent_id'] as $comment) {
//			print_r($comment);
			echo "
				<div class='comment' comment_id=".$comment['comment_id']." article_id=".$comment['article_id'].">
					<p>Written by: ".$comment['name']."</p>
					<div style='margin-left:".($level * 25)."px;'>".$comment['comment']."
					</div>
					<textarea class='form-control form-comment-c' comment_id=".$comment['comment_id']." placeholder='Reply ".$comment['name']."'></textarea>
				</div>";
			$level++;
			outComments($comments, $parent_id, $level);
			$level--;
		}

	}
}

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