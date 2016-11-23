                <div>
                    <div class="chat-activity-list">
                    @foreach($TicketComment as $TicketComment)
                        @if($TicketComment->id_users==1)
                            <div class="chat-element">
                                <a href="" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a2.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">hace 1 min</small>
                                    <strong>Evanny Karol</strong>

                                    <p class="m-b-xs">
                                        <?php echo $TicketComment->comment ?>
                                    </p>
                                    <small class="text-muted">Hoy 4:21 pm - 12.06.2014</small>
                                </div>
                            </div>
                        @else
                            <div class="chat-element right">
                                <a href="" class="pull-right">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>

                                <div class="media-body text-right ">
                                    <small class="pull-left">5m ago</small>
                                    <strong>Bill gates</strong>

                                    <p class="m-b-xs">
                                        <?php echo $TicketComment->comment ?>
                                    </p>
                                    <small class="text-muted">Hoy 4:21 pm - 12.06.2014</small>
                                </div>
                            </div>
                        @endif                        
                    @endforeach                        
                    </div>
                </div>