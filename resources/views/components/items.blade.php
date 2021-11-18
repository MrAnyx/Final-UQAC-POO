<div class="ui four column grid" style="width: 1200px; margin: 30px auto 0 auto">
   @foreach ($items as $item)
      <div class="column">
         <div class="ui link fluid card">
            <div class="image">
               <img src="{{route('app_displayImage', $item->image)}}">
            </div>
            <div class="content">
               <div class="header">{{$item->name}}</div>
               <div class="meta" style="margin-top: 6px; margin-bottom: 18px;">
                  @foreach ($item->departments as $key => $department)
                     <a href="{{route('app_department', ['id' => $department->id])}}">{{$department->name}}</a>
                  @endforeach
               </div>
               <div class="header" style="margin-bottom: 18px">${{$item->price}}</div>
              <cart-button :in-cart="{{$inCart[$item->id] ? 'true' : 'false'}}" :item-id="{{$item->id}}"></cart-button>
            </div>
            
         </div>
      </div>
   @endforeach
 </div>