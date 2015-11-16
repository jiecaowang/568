function _OnlineNowNodeParser_locateNodes()
{
	var CurrentNode = null;
	var i = 0;
	while ((CurrentNode = document.getElementById("UserDataNode" + i)) != null)
	{
		NodeIndex = this.NodeArray.length;
		this.NodeArray[NodeIndex] = new Object();
		this.NodeArray[NodeIndex].NodeID = CurrentNode.id;
		var Attributes = CurrentNode.className.split(";");
		for (var AttributeIterator = 0; AttributeIterator < Attributes.length; AttributeIterator++)
		{
			var Name = Attributes[AttributeIterator].split("=")[0];
			var Value = Attributes[AttributeIterator].split("=")[1];
			if (Name != "" && Value != "") eval("this.NodeArray[" + NodeIndex + "]." + Name + "=\"" + Value + "\";");
		}
		i++;
	}
}