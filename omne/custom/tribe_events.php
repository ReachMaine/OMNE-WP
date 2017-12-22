<?php
/* custom coding for tribe events plugin */

/* on single events add a link to the cancelation text after the content, before the google/ical buttons*/
add_action('tribe_events_single_event_after_the_content', 'omne_event_cancelations', 9);
function omne_event_cancelations() {

  $html_out = "";
  $html_out .= '<div class="omne_after_event_content">View OMNE <a href="https://www.omne.org/wp-content/uploads/2017/12/meeting-cancellation-policy.pdf" target="_blank" rel="noopener">Meeting Cancellation Policies</a>.</div>';
  echo $html_out;

}
