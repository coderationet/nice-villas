<div class="form-group">
    <label for="name">{{__('admin/general.name')}}</label>
    <input type="text" class="form-control" id="category"
           name="name"
           @if(isset($item_category))
               value="{{$item_category->name}}"
           @endif
           required
           placeholder="{{__('admin/general.insert_name')}}">
</div>
<!-- parent_id -->
<div class="form-group">
    <label for="parent_id">{{__('admin/category.parent_category')}}</label>
    <select class="form-control" name="parent_id" id="parent_id">
        <option value="">{{__('admin/category.parent_category')}}</option>
        {!! \App\Helpers\HierarchicalListingHelper::get_listing_options_html($item_categories,isset($item_category) ? $item_category->parent_id : 0,'') !!}
    </select>
</div>
