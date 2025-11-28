<x-layout>
    <h1 class='font-bold text-center text-4xl mb-10'>See All available books</h1>
    <ul class="flex flex-col gap-5">
        @foreach($books as $item)
           <li> 
            <x-bookCard href="{{route('books.about',$item->id)}}"  :book="$item"  :highlight="true">
                <div>
                    <p>{{$item['title']}}</p>
                    <p>{{$item->category->name}}</p>
                </div>
            </x-bookCard>
            </li> 
        @endforeach
    </ul>
</x-layout>
  {{-- <p>{{$item['title']}}</p>
            <a href="/books/{{$item['id']}}">View details</a> --}}