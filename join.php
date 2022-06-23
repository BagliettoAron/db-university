1. Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia

SELECT *
FROM `students`
INNER JOIN `degrees`
ON `students`.`degree_id`=`degrees`.`id`
WHERE `degrees`.`name`=`Corso di Laurea in Economia`;

2.Selezionare tutti i Corsi di Laurea Magistrale del Dipartimento di Neuroscienze

SELECT *
FROM `degrees`
INNER JOIN `departments`
ON `degrees`.`department_id`=`departments`.`id`
WHERE `departments`.`name`=`Dipartimento di Neuroscienze`
AND `degrees`.`level`=`magistrale`;

3. Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44)

SELECT *
From `courses`
INNER JOIN `course_teacher`
ON `courses`.`id`=`course_teacher`.`course_id`
WHERE `course_teacher`.`teacher_id`=44;

4. Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome

SELECT `students`.`name`, `students`.`surname`, `degrees`.`name` AS `degree_name`, `departments`.`name` AS `department_name`
FROM `students`
INNER JOIN `degrees`
ON `students`.`degree_id`=`degrees`.`id`
INNER JOIN `departments`
ON `degrees`.`department_id`=`departments`.`id`
ORDER BY `students`.`surname`, `students`.`name`;