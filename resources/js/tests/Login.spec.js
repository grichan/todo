// import { shallowMount } from "@vue/test-utils";
// import App from "../views/Login";

// let wrapper = null;

// beforeEach(() => {
//     wrapper = shallowMount(App, {
//         // propsData: {
//         //     fieldLengthX: 10,
//         //     fieldLengthY: 10
//         // }
//     });
// });

// afterEach(() => {
//     wrapper = null;
// });
import { shallowMount } from "@vue/test-utils";
import LoginForm from "../components/LoginForm";

let wrapper = null;

beforeEach(() => {
    wrapper = shallowMount(LoginForm);
});

afterEach(() => {
    wrapper.destroy();
});

describe("Login", () => {
    it("renders", () => {
        const form = wrapper.findAll("form");
        const inputs = wrapper.findAll("input");
        const button = wrapper.findAll("button");

        expect(form.length).toBe(1);
        expect(inputs.length).toBe(2);
        expect(button.length).toBe(1);
    });
});

expect(wrapper).toMatchSnapshot();
