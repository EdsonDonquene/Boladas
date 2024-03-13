<div class="container_category_container" id="container_category_container">
<div class="row">
    <div class="file-field input-field">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" accept=".jpeg,.jpg,.png" limit ="3" id="prod_imgs" multiple>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" onchange="checkLabel()" type="text" placeholder="Escolha 3 imagens" id="img_prod_label">
        </div>
    </div>
    <p id="error_msg" style="font-size:50%;margin: 2px 0 2px 40px; color:red;"></p>

</div>


<div class="row">
    <div class="input-field col s6">
        <i class="material-icons prefix">category</i>
        <input name="prod_name" id="prod_name" type="text" class="validate">
        <label for="fullname">Item</label>
    </div>

    <div class="input-field col s6">
        <i class="material-icons prefix">payments</i>
        <input name="price" id="price" type="number" class="validate">
        <label for="price">Preço</label>
    </div>
</div>

<div class="row">
    <div class="input-field col s6 m6">
        <i class="material-icons prefix">pin_drop</i>
        <select class="" id="location">
            <option value="" disabled selected>Provincia</option>
            <option value="1" >Maputo</option>
            <option value="2" >Gaza</option>
            <option value="3" >Inhambane</option>
            <option value="4" >Manica</option>
            <option value="5" >Sofala</option>
            <option value="6" >Tete</option>
            <option value="7" >Zambezia</option>
            <option value="8" >Nampula</option>
            <option value="9" >Cabo Delgado</option>
            <option value="10" >Niassa</option>
        </select>
    </div>
    <div class="input-field col s6 m6">
        <i class="material-icons prefix">info</i>
        <select class="" id="status">
            <option value="" disabled selected>Estado</option>
            <option value="1" >Novo</option>
            <option value="2" >Usado - boas condições</option>
            <option value="3" >Usado - com defeitos</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="row valign-wrapper">
        <i style="font-size:100%;margin-left:0px;" class="material-icons prefix">local_shipping</i>
        <span style="font-size:60%; margin-left: 25px; ">Entregas</span>
    </div>
    
    <div class="switch deliver_switch">
        <label>
        Não
        <input type="checkbox">
        <span class="lever"></span>
        Sim
        </label>
    </div>
</div>

<div class="row container_post_btn">
    <button class="hide-on-small-and-down btn waves-effect waves-dark" onclick="return submitNewPost()">
        Postar
        <i class="material-icons right">send</i>
    </button>
</div>

</div>