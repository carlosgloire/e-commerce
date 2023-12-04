
<style>
.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
    transition: 1s ease-in-out;
}
.popup-content {
    background-color: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: center;
   
}
.close {
    cursor: pointer;
    
}

.warning {
    color: #666;
    font-size: 16px;
    margin-bottom: 10px;
}
.popup-content div button{
    background-color:#3498db;
    color: white;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
}
.popup-content div a{
    background-color:#f82b2b;
    color: white;
    border-radius: 5px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 3px;
    padding-top: 3px;
}

</style>