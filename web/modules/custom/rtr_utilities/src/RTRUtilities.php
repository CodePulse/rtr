<?php

namespace Drupal\rtr_utilities;

use Drupal\Core\Url;

/**
 * Class RTRUtilities.
 *
 * Helper class to return data/
 */
class RTRUtilities {

  /**
   * Get the image path from the media field.
   *
   * @param $media_field
   *   Media field referencing the "Image" bundle.
   */
  public function getMediaImage($media_field) {
    $image_media_entity = $media_field->first()
      ->get('entity')
      ->getTarget()
      ->getValue();
    if ($image_media_entity->hasField('field_media_image') && !$image_media_entity->get('field_media_image')->isEmpty()) {
      $image_file_entity = $image_media_entity->get('field_media_image')->first()
        ->get('entity')
        ->getTarget()
        ->getValue();
      $image_path = file_create_url($image_file_entity->getFileUri());
      return $image_path;
    }
    return '';
  }

  /**
   * Get the video path from the media field.
   *
   * @param $media_field
   *   Media field referencing the "Video" bundle.
   */
  public function getMediaVideo($media_field) {
    $video_media_entity = $media_field->first()
      ->get('entity')
      ->getTarget()
      ->getValue();
    if ($video_media_entity->hasField('field_media_video_file') && !$video_media_entity->get('field_media_video_file')->isEmpty()) {
      $videlo_file_entity = $video_media_entity->get('field_media_video_file')->first()
        ->get('entity')
        ->getTarget()
        ->getValue();
      $image_path = file_create_url($videlo_file_entity->getFileUri());
      return $image_path;
    }
    return '';
  }


  /**
   * Helper function to obtain text and path for link field.
   * @param $link_field
   *
   * @return array
   */
  public function getLinkFieldURL($link_field) {
    $link_values = $link_field->first()->getValue();
    $partial_uri = substr($link_values['uri'], 0, 12);
    if ($partial_uri === "entity:node/") {
      // This is an internal URL. Link will be generated differently.
      $node_url = Url::fromUri($link_values['uri']);
      $link_path = $node_url->toString();
    }
    else {
      $link_path = $link_values['uri'];
    }
    $link_title = $link_values['title'];

    return [
      'link_path' => $link_path,
      'link_title' => $link_title,
    ];
  }
}
