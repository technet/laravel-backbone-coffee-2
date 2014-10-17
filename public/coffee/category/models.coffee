class Category extends app.BaseModel
    urlRoot:'/api/categories'
    defaults:
        code:''
        name:''

class CategorySearchModel extends app.BaseModel

@app = window.app ? {}
@app.Category = Category
@app.CategorySearchModel = CategorySearchModel
