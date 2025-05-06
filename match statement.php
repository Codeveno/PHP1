
<?php
$grade = 'B';
$feedback  =match($grade) {
    'A' => 'Excellent work!',
    'B' => 'Good job, but there is room for improvement.',
    'C' => 'You passed, but you need to work harder.',
    'D' => 'You barely passed. Please see me for help.',
    default => 'Invalid grade.'
};
echo $feedback;
