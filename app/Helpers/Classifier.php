<?php

namespace App\Helpers;

class Classifier
{
    public static function classify($text)
    {
        $categories = [
            'security' => ['hacker', 'phishing', 'malware', 'rsa', 'breach', 'exploit', 'vulnerability'],
            'medical' => ['heart', 'patient', 'disease', 'hospital', 'treatment'],
            'technology' => ['java', 'code', 'programming', 'algorithm', 'compiler'],
            'business' => ['invoice', 'payment', 'profit', 'finance', 'sale'],
            'education' => ['student', 'lecture', 'exam', 'teacher', 'university'],
        ];

        $text = strtolower($text);
        $matches = [];

        foreach ($categories as $category => $keywords) {
            foreach ($keywords as $word) {
                if (str_contains($text, $word)) {
                    $matches[$category] = ($matches[$category] ?? 0) + 1;
                }
            }
        }

        return count($matches) ? array_keys($matches, max($matches))[0] : 'uncategorized';
    }
}
