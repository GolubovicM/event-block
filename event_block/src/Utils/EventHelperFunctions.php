<?php

namespace Drupal\event_block\Utils;

class EventHelperFunctions {

    public function formatDate(string $date) : string
    {
        if (empty($date)) {
            return 'Not on event page';
        }

        $today = time();
        $eventDate = strtotime($date);
        $dateDifferenceInDays = round(($eventDate - $today) / (60 * 60 * 24));

        if ($dateDifferenceInDays < 0){
            return 'This event already passed.';
        }elseif ($dateDifferenceInDays == 0){
            return 'This event is happening today.';
        }elseif ($dateDifferenceInDays == 1){
            return '1 day left until event starts.';
        }else{
            return $dateDifferenceInDays.' days left until event starts.';
        }
    }

    public function getCurrentEventDate() : string
    {
        $node = \Drupal::routeMatch()->getParameter('node');
        if ($node instanceof \Drupal\node\NodeInterface) {
            if ($node->getType() == 'event'){
                $date =  $node->get('field_date')->value;
                return $date;
            }
        }
        return '';
    }

}