# This is a view to represent Category Search panel
class CategorySearhView extends app.BaseView
    el:'#search'

    events:
        'click .btn-search':'search'
        'click .btn-clear':'clear'
        
    initialize:->
        @$el.empty()
        @$el.html $('#tpl-category-search').html()
        @render()

    render:->

    search: (e)->
        e.preventDefault()
        @model.trigger 'search'

    clear: (e)->
        e.preventDefault()
        @model.trigger 'reset'
        

# This is a view to represent Category results section
class CategoryResultView extends app.BaseView
    el:'#results'
    events:
        'click #btn-add':'create'

    initialize:->
        @collection.on 'sync reset', @render, @ 
        @$el.empty()
        @$el.html $('#tpl-category-results').html()
        @render()   

    render:->
        $tbody = @$('tbody')
        $tbody.empty()
        $this = @
        @collection.each (item) ->
            item.on 'save'   ,$this.itemSave    ,$this
            item.on 'delete' ,$this.itemDelete  ,$this
            item.on 'edit'   ,$this.itemEdit    ,$this
            item.on 'cancel' ,$this.cancelEdit  ,$this      
            displayView = new app.CategoryRowDisplayView model:item
            $tbody.append displayView.render().el       
        @   
        
    create:->
        newItem = new app.Category code:'', name:''
        newItem.on 'save'   ,@itemSave    ,@
        newItem.on 'delete' ,@itemDelete  ,@
        newItem.on 'edit'   ,@itemEdit    ,@
        newItem.on 'cancel' ,@cancelEdit  ,@
        editView = new app.CategoryRowEditView model:newItem
        @$('tbody').prepend editView.render().el

    itemSave: (view)->
        model = view.model
        model.save null,
            wait:true
            success: (rmodel, response)->
                rowView = new CategoryRowDisplayView model:model
                $editViewEl = view.$el
                $editViewEl.replaceWith rowView.render().el
                $editViewEl.attr 'id', model.id
            error: (rmodel, errors) ->
                console.log errors        

    itemDelete: (view)->
        model = view.model
        if model.isNew()                # Just remove the view no need to send server call
            view.remove()               
        else
            model.destroy
                wait:true
                success: -> view.remove()
                error: (rmodel, errors) -> console.log errors                
                
    itemEdit: (view)->
	    $rowViewEl = view.$el
	    model = view.model
	    # Create new edit view with the model
	    editView = new app.CategoryRowEditView model:model
	    $rowViewEl.replaceWith editView.render().el
	    $rowViewEl.attr 'id', model.id
        
    cancelEdit: (view)->
        model = view.model
        if model.isNew() 
            view.remove()
        else
            rowView = new CategoryRowDisplayView model:model
            $editViewEl = view.$el
            $editViewEl.replaceWith rowView.render().el   
    


            
# This is a view to represent main view section and it contains two sub views, CategorySearchView and 
# CategoryResultView
class CategoriesView extends app.BaseView
    initialize:->
        @searchModel = new app.CategorySearchModel
        @searchModel.on 'search', @search, @
        @searchModel.on 'reset', @reset, @

        @categoryCollection = new app.CategoryCollection

        @searchView = new app.CategorySearhView model: @searchModel
        @resultView = new app.CategoryResultView collection:@categoryCollection

    search:->
        @categoryCollection.fetch()

    reset:->
        @categoryCollection.reset []
        
        
# This is a view to represent display mode row of the category table with contents.
class CategoryRowDisplayView extends app.BaseView
    tagName: 'tr'
    template: _.template($('#tpl-category-row').html())
    events:
        'click .btn-edit':'edit'
        'click .btn-delete':'delete'
 
    render:->
        @$el.html @template(m: @model.toJSON())
        @$el.attr 'id', @model.id               
        @
 
    edit:->
        @model.trigger 'edit', @
 
    delete:->
        @model.trigger 'delete', @
        
        
        
# This is a view to represent edit mode row of the category table with contents.        
class CategoryRowEditView extends app.BaseView
    tagName: 'tr'
    template: _.template($('#tpl-category-edit').html())
    events:
        'click .btn-save':'save'
        'click .btn-cancel':'cancel'
 
    render:->
        @$el.html @template(m: @model.toJSON())
        @$el.attr 'id', if @model.id? then @model.id else @model.cid                
        @
 
    save:->
        # Update the model with values
        @model.set code:@$('.code-edit').val(), name:@$('.name-edit').val()
        @model.trigger 'save', @                # we'll trigger it is done with the view
 
    cancel:->
        @model.trigger 'cancel', @              # we'll inform user cancel the edit         

        
# Make these classes available globally via 'app' object.
@app = window.app ? {}	
@app.CategorySearhView = CategorySearhView
@app.CategoryResultView = CategoryResultView
@app.CategoriesView = CategoriesView
@app.CategoryRowDisplayView = CategoryRowDisplayView
@app.CategoryRowEditView = CategoryRowEditView