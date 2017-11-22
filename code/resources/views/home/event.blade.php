<div class="event__frame col-12 col-md-6 col-lg-4">
    <div class="image__wrapper event__image" style="background-image: url('https://static.pexels.com/photos/126407/pexels-photo-126407.jpeg');">
        <img width="100%" height="100%" src="{{$event->img}}">
    </div>
    <div class="row">
        <div class=" col-3 ">
           <div class="event__date">
               <h3>
                   {{$event->date->format("M")}}
               </h3>
               <h4>
                   {{$event->date->format("d")}}
               </h4>
               <hr>
               <h3>
                   <i class="fa fa-heart"></i>
               </h3>
           </div>
        </div>
        <div class="event__text col-9">
            <h3>{{$event->title}}</h3>
            <h4>Created By </h4>
            {{$event->description}}
            <br><a style="clear:both; float:left;" href="/event/{{$event->id}}"><i class="fa fa-arrow-right"></i> Lees meer</a>
        </div>
    </div>
</div>