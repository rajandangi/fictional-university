import $ from 'jquery';
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
    createLike() {
        $.ajax({
            url: universityData.root_url + '/wp-json/university/v1/manageLike',
            type: 'POST',
            success: (response) => {
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            }
        });
    }
    deleteLike() {
        $.ajax({
            url: universityData.root_url + '/wp-json/university/v1/manageLike',
            type: 'DELETE',
            success: (response) => {
                console.log(response);
            },
            error: (response) => {
                console.log(response);
            }
        });
    }
}
export default Like;