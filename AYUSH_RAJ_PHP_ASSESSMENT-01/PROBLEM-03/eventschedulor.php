<?php

class Event
{
    private $title;
    private $startDateTime;
    private $endDateTime;

    public function __construct($title, $startDateTime, $endDateTime)
    {
        $this->title = $title;
        $this->setStartDateTime($startDateTime);
        $this->setEndDateTime($endDateTime);
    }

    public function setStartDateTime($startDateTime)
    {
        $start = new DateTime($startDateTime);
        if ($this->endDateTime && $start >= $this->endDateTime) {
            echo "Error: Start time must be before end time.";
            return;
        }
        $this->startDateTime = $start;
    }

    public function setEndDateTime($endDateTime)
    {
        $end = new DateTime($endDateTime);
        if ($this->startDateTime && $end <= $this->startDateTime) {
            echo "Error: End time must be after start time.";
            return;
        }
        $this->endDateTime = $end;
    }

    public function getDurationInHours()
    {
        $duration = $this->startDateTime->diff($this->endDateTime);
        return $duration->h + ($duration->days * 24);
    }

    public function displayEventForDate($date)
    {
        if($date !==null || $date !== ' ')
        {
        $eventDate = new DateTime($date);
        if (isset($eventDate)) {
            echo "Event Title: $this->title"."<br/>";
            echo "Start Time: " . $this->startDateTime->format('Y-m-d H:i:s') . "<br/>";
            echo "End Time: " . $this->endDateTime->format('Y-m-d H:i:s') . "<br/>";
            echo "<hr/>";
        }
    }
        else{
            echo "Date not present";
        }
    }
}


$event = new Event("Meeting", "2024-02-28 5:00:00 AM", "2024-02-28 11:00:00 AM");
echo "Duration of the event: " . $event->getDurationInHours() . " hours"."<br/>";
$event->displayEventForDate(' ');

$event2 = new Event("Interview", "2024-02-28 5:00:00 PM", "2024-02-28 7:00:00 PM");
echo "Duration of the event: " . $event2->getDurationInHours() . " hours"."<br/>";
$event2->displayEventForDate("2024-02-28");
?>