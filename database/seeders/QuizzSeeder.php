<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create(
            [
                'question_text' => 'PHP stands for -',
                'option_a' => 'Hypertext Preprocessor',
                'option_b' => 'Pretext Hypertext Preprocessor',
                'option_c' => 'Personal Home Processor',
                'option_d' => 'None of the above',
                'correct_answer' => 'Hypertext Preprocessor',
        ]);
        Question::create(
            [
                'question_text' => 'Who is known as the father of PHP?',
                'option_a' => 'Drek Kolkevi',
                'option_b' => 'List Barely',
                'option_c' => 'Rasmus Lerdrof',
                'option_d' => 'None of the above',
                'correct_answer' => 'Rasmus Lerdrof',
        ]);
        Question::create(
        [
                'question_text' => 'Variable name in PHP starts with -',
                'option_a' => '! (Exclamation)',
                'option_b' => '$ (Dollar)',
                'option_c' => '& (Ampersand)',
                'option_d' => '# (Hash)',
                'correct_answer' => '$ (Dollar)',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is the default file extension of PHP?',
                'option_a' => '.php',
                'option_b' => '.hphp',
                'option_c' => '.xml',
                'option_d' => '.html',
                'correct_answer' => '.php',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is not a variable scope in PHP?',
                'option_a' => 'Extern',
                'option_b' => 'Local',
                'option_c' => 'Static',
                'option_d' => 'Global',
                'correct_answer' => 'Extern',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is used to display the output in PHP?',
                'option_a' => 'echo',
                'option_b' => 'print',
                'option_c' => 'write',
                'option_d' => 'Both (a) and (b)',
                'correct_answer' => 'Both (a) and (b)',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is the use of strlen() function in PHP?',
                'option_a' => 'The strlen() function returns the type of string',
                'option_b' => 'The strlen() function returns the length of string',
                'option_c' => 'The strlen() function returns the value of string',
                'option_d' => 'The strlen() function returns both value and type of string',
                'correct_answer' => 'The strlen() function returns the length of string',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following starts with __ (double underscore) in PHP?',
                'option_a' => 'User-defined constants',
                'option_b' => 'Magic constants',
                'option_c' => 'write',
                'option_d' => 'Default constants',
                'correct_answer' => 'Magic constants',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is used to display the output in PHP?',
                'option_a' => 'echo',
                'option_b' => 'print',
                'option_c' => 'write',
                'option_d' => 'Both (a) and (b)',
                'correct_answer' => 'Both (a) and (b)',
        ]);
        Question::create(
        [
                'question_text' => 'What does PEAR stands for?',
                'option_a' => 'PHP extension and application repository',
                'option_b' => 'PHP enhancement and application reduce',
                'option_c' => 'PHP event and application repository',
                'option_d' => 'None of the above',
                'correct_answer' => 'PHP extension and application repository',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following PHP function is used to generate unique id?',
                'option_a' => 'id()',
                'option_b' => 'mdid()',
                'option_c' => 'uniqueid()',
                'option_d' => 'None of the above',
                'correct_answer' => 'uniqueid()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is the correct way to create a function in PHP?',
                'option_a' => 'Create myFunction()',
                'option_b' => 'New_function myFunction()',
                'option_c' => 'function myFunction()',
                'option_d' => 'None of the above',
                'correct_answer' => 'function myFunction()',
        ]);
        Question::create(
        [
                'question_text' => 'What is the use of fopen() function in PHP?',
                'option_a' => 'The fopen() function is used to open folders in PHP',
                'option_b' => 'The fopen() function is used to open remote server',
                'option_c' => 'The fopen() function is used to open files in PHP)',
                'option_d' => 'None of the above',
                'correct_answer' => 'The fopen() function is used to open folders in PHP',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function displays the information about PHP and its configuration?',
                'option_a' => 'php_info()',
                'option_b' => 'phpinfo()',
                'option_c' => 'info()',
                'option_d' => 'None of the above',
                'correct_answer' => 'phpinfo()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function is used to find files in PHP?',
                'option_a' => 'glob()',
                'option_b' => 'fold()',
                'option_c' => 'file()',
                'option_d' => 'None of the above',
                'correct_answer' => 'glob()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function is used to set cookie in PHP?',
                'option_a' => 'createcookie()',
                'option_b' => 'makecookie()',
                'option_c' => 'setcookie()',
                'option_d' => 'None of the above',
                'correct_answer' => 'setcookie()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function is used to get the ASCII value of a character in PHP?',
                'option_a' => 'val()',
                'option_b' => 'asc()',
                'option_c' => 'ascii()',
                'option_d' => 'chr()',
                'correct_answer' => 'chr()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function is used to unset a variable in PHP?',
                'option_a' => 'delete()',
                'option_b' => 'unset()',
                'option_c' => 'unlink()',
                'option_d' => 'None of the above',
                'correct_answer' => 'unset()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function is used to sort an array in descending order?',
                'option_a' => 'sort()',
                'option_b' => 'asort()',
                'option_c' => 'dsort()',
                'option_d' => 'rsort()',
                'correct_answer' => 'rsort()',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is/are the code editors in PHP?',
                'option_a' => 'Notepad++',
                'option_b' => 'Notepad',
                'option_c' => 'Adobe Dreamweaver',
                'option_d' => 'All of the above',
                'correct_answer' => 'All of the above'
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is used to end a statement in PHP?',
                'option_a' => '. (dot)',
                'option_b' => '; (semicolon)',
                'option_c' => '! (exclamation)',
                'option_d' => '/ (slash)',
                'correct_answer' => '; (semicolon)',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following function in PHP can be used to test the type of any variable?',
                'option_a' => 'showtype()',
                'option_b' => 'gettype()',
                'option_c' => 'settype()',
                'option_d' => 'None of the above',
                'correct_answer' => 'gettype()',
        ]);
        Question::create(
        [
                'question_text' => 'String values in PHP must be enclosed within -',
                'option_a' => 'Double Quotes',
                'option_b' => 'Single Quotes',
                'option_c' => 'Both (a) and (b)',
                'option_d' => 'None of the above',
                'correct_answer' => 'Both (a) and (b)',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following variable name is invalid?',
                'option_a' => '$newVar',
                'option_b' => '$new_Var',
                'option_c' => '$new Var',
                'option_d' => 'All of the above',
                'correct_answer' => '$new-var',
        ]);
        Question::create(
        [
                'question_text' => 'Which of the following is the correct way to create an array in PHP?',
                'option_a' => '$season = array["summer" , "winter" , "spring" , "autumn"];',
                'option_b' => '$season = array("summer" , "winter" , "spring" , "autumn");',
                'option_c' => '$season = "summer" , "winter" , "spring" , "autumn";',
                'option_d' => 'All of the above',
                'correct_answer' => '$season = array("summer" , "winter" , "spring" , "autumn");',
        ]);

    }
}
