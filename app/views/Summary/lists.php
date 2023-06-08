<h2>TO DO LIST</h2>
            <?php foreach($data['lists'] as $list) : ?>
                <ul class="list">

                    <div class="delete-list">
                        <i class="fa-solid fa-circle-xmark" onclick="deleteList(event)" name="<?= $list['id_list'] ?>"></i>
                    </div>

                    <h3><?= $list['judul_list'] ?></h3>
                    <?php foreach($data['items'] as $item) :?>
                        <?php if($item['id_list'] == $list['id_list']) :?> 
                            <li class="item">
                                <p onblur="editItem(event)" contenteditable="true" name="<?= $item['id_item'] ?>"><?php if($item['info'] == 'y') { ?> <del><?= $item['content'] ?></del><?php } else echo $item['content']?></p>
                                <div class="item-property" onclick="checkList(event)">
                                    <i class="fa-solid fa-trash" name="<?= $item['id_item'] ?>"></i>
                                    <input value="<?= $item['info'] ?>" type="checkbox" onclick="checkList(event)" <?php if($item['info'] == 'y') echo 'checked' ?> name="<?= $item['id_item']?>">
                                </div>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                    <li class="new-item">
                        <input type="text" id="judul-item">
                        <button type="button" class="new-item-button" value="<?= $list['id_list']?>">Tambah</button>
                    </li>
                </ul>
            <?php endforeach ?>
            <ul class="list new-list-button">
                Tambah List
            </ul>

            <ul class="list new-list" style="display:none;">
                <input type="text" id="new-list-input">
                <div class="button-group">
                    <button class="new-list-action">Tambah</button>
                    <button class="cancel-new-list">Batal</button>
                </div>
            </ul>