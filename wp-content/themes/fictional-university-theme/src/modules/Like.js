class Like {
    constructor() {
        this.events();
    }
    events() {
        $(".like-box").on("click", this.ourClickDispatcher.bind(this));
    }
    
    //methods
    ourClickDispatcher(e) {
        var currentLikeBox = $(e.target).closest(".like-box");
        if (currentLikeBox.attr("data-exists") == "yes") {
            this.deleteLike(currentLikeBox);
        } else {
            this.createLike(currentLikeBox);
        }
    }
    createLike(currentLikeBox) {
        alert("create");
    }
    deleteLike(currentLikeBox) {
        alert("delete");
    }
}
export default Like;