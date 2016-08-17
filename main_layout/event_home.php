    <?php
      $date=strtotime($event['event_start_date']);
    ?>
    <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-phone">
              <div class="kartu mdl-shadow--2dp">
                      <div class="mdl-card__media">
                         <img src="images/events/<?php echo $event['event_image'] ?>">
                      </div>
                      <div class="black mdl-card__supporting-text">
                          <span class="mdl-typography--font-light"><?php echo $event['event_category'] ?></span>
                          <span class="main_card mdl-card__title-text mdl-typography--font-bold">
                             <a href="detail.php?id=<?php echo $event['event_id'] ?>"><b><?php echo truncate($event['event_title'],20) ?></a></b>
                          </span>
                          <span class="mdl-typography--font-medium">
                          <?php echo $event['event_city'] ?> | <?php echo date("d.m.Y", $date) ?>
                          </span>
                          <br>
                          <span class="mdl-typography--font-medium">
                          <?php echo $event['event_type'] ?>
                          </span>
                      </div>
              </div>
        </div>