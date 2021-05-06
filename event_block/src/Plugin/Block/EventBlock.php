<?php

namespace Drupal\event_block\Plugin\Block;

use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Event' Block.
 *
 * @Block(
 *   id = "event_block",
 *   admin_label = @Translation("Event block"),
 *   category = @Translation("Event"),
 * )
 */
class EventBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $eventDate = \Drupal::service('event_block.helper_functions')->getCurrentEventDate();
        return [
            '#markup' => \Drupal::service('event_block.helper_functions')->formatDate($eventDate),
        ];
    }

    public function getCacheMaxAge() : int {
        return 0;
    }
}