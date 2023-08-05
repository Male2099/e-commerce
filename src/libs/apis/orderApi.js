import axios from "axios";

const API_URL = import.meta.env.VITE_API_BASE_URL;
const getToken = () => {
  const cookies = document.cookie.split("; ");
  const tokenCookie = cookies.find((cookie) =>
    cookie.startsWith("M-Donut-Token=")
  );
  if (!tokenCookie) {
    return false;
  }
  return decodeURIComponent(tokenCookie.split("=")[1]);
};

const orders = {
  async create() {
    try {
      const res = await axios.post(API_URL + "/api/orders", null, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 201) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async currentOrder() {
    try {
      const res = await axios.get(API_URL + "/api/orders/current-order", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      await this.create();
      console.error(err.response.data.errors);
    }
    return false;
  },
  async update(data) {
    try {
      const res = await axios.patch(API_URL + "/api/orders", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async pendingOrders() {
    try {
      const res = await axios.get(API_URL + "/api/orders/pending-orders", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async finishedORder() {
    try {
      const res = await axios.get(API_URL + "/api/orders/finished-orders", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async all() {
    try {
      const res = await axios.get(API_URL + "/api/orders/all", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async exclude_busyOrder() {
    try {
      const res = await axios.get(API_URL + "/api/orders/exclude-busy", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async update_AdminOnly(data) {
    try {
      data.status = "finished";
      const res = await axios.patch(
        API_URL + "/api/orders/update/" + data.id,
        data,
        {
          headers: {
            accept: "application/json",
            "Content-Type": "application/json",
            Authorization: `Bearer ${getToken()}`,
          },
        }
      );
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
};

export default orders;
